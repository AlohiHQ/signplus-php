<?php

declare(strict_types=1);

namespace Signplus;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Throwable;

/**
 * Guzzle middleware for automatic retry logic with exponential backoff.
 *
 * This middleware intercepts HTTP requests and automatically retries failed requests
 * based on configurable criteria including HTTP status codes, HTTP methods, maximum
 * retry attempts, and exponential backoff delays with optional jitter.
 *
 * Implements the Guzzle middleware pattern for seamless integration with the HTTP client.
 */
class Retry
{
  /**
   * @var array<string, mixed> Default retry configuration options
   */
  private array $retryOptions = [
    'isEnabled' => true,
    'maxRetries' => 3,
    'baseDelayMs' => 150,
    'maxDelayMs' => 5000,
    'delayJitter' => 50,
    'delayMultiplier' => 2,
    'retryableStatuses' => [408, 429, 500, 502, 503, 504],
    'retryableMethods' => ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'HEAD', 'OPTIONS']
  ];

  /**
   * @var callable The next handler in the middleware chain
   */
  private $handler;

  /**
   * Factory method for creating retry middleware.
   *
   * Returns a closure that can be pushed onto a Guzzle HandlerStack.
   *
   * @param array $retryOptions Optional retry configuration overrides
   * @return \Closure Factory function that creates Retry middleware
   */
  public static function factory(array $retryOptions = []): \Closure
  {
    return function (callable $handler) use ($retryOptions): self {
      return new self($handler, $retryOptions);
    };
  }

  /**
   * Construct a new Retry middleware instance.
   *
   * @param callable $handler The next handler in the middleware chain
   * @param array $retryOptions Configuration options to override defaults
   */
  public function __construct(callable $handler, array $retryOptions = [])
  {
    $this->handler = $handler;
    $this->retryOptions = array_replace($this->retryOptions, $retryOptions);
  }

  /**
   * Invoke the retry middleware to handle a request.
   *
   * Executes the request through the handler chain and applies retry logic
   * on failures based on the configured retry options.
   *
   * @param RequestInterface $request The HTTP request
   * @param array $options Request options
   * @return PromiseInterface Promise that resolves to a response or rejects with an exception
   */
  public function __invoke(RequestInterface $request, array $options): PromiseInterface
  {
    $options = array_replace($this->retryOptions, $options);
    $options['retryCount'] = $options['retryCount'] ?? 0;

    $next = $this->handler;
    return $next($request, $options)->then(
      $this->onSuccess($request, $options),
      $this->onFailure($request, $options)
    );
  }

  /**
   * Create a callback for handling successful responses.
   *
   * Determines whether a successful response should be retried based on
   * its status code and the configured retry criteria.
   *
   * @param RequestInterface $request The HTTP request
   * @param array $options Request options
   * @return callable Callback that processes the response
   */
  protected function onSuccess(RequestInterface $request, array $options): callable
  {
    return function (ResponseInterface $response) use ($request, $options) {
      return $this->shouldRetry($options, $request, $response)
        ? $this->retryRequest($request, $options, $response)
        : $response;
    };
  }

  /**
   * Create a callback for handling failed requests.
   *
   * Determines whether a failed request should be retried based on
   * the exception type and response status code.
   *
   * @param RequestInterface $request The HTTP request
   * @param array $options Request options
   * @return callable Callback that processes the exception
   */
  protected function onFailure(RequestInterface $request, array $options): callable
  {
    return function (Throwable $exception) use ($request, $options): PromiseInterface {
      if ($exception instanceof \GuzzleHttp\Exception\RequestException) {
        $response = $exception->getResponse();
        if ($response && $this->shouldRetry($options, $request, $response)) {
          return $this->retryRequest($request, $options, $response);
        }
      }

      return \GuzzleHttp\Promise\Create::rejectionFor($exception);
    };
  }

  /**
   * Determine whether a request should be retried.
   *
   * Checks if retry is enabled, if the HTTP method is retryable,
   * if the status code matches retryable statuses, and if the
   * maximum retry count has not been reached.
   *
   * @param array $options Request options including retry configuration
   * @param RequestInterface $request The HTTP request
   * @param ResponseInterface $response The HTTP response
   * @return bool True if the request should be retried, false otherwise
   */
  protected function shouldRetry(
    array $options,
    RequestInterface $request,
    ResponseInterface $response
  ): bool {
    if (
      !$options['isEnabled'] ||
      !in_array($request->getMethod(), $options['retryableMethods'], true)
    ) {
      return false;
    }

    $statusCode = $response->getStatusCode();
    return in_array($statusCode, $options['retryableStatuses'], true) &&
      $options['retryCount'] < $options['maxRetries'];
  }

  /**
   * Retry a failed request with exponential backoff delay.
   *
   * Calculates the delay based on the retry count using exponential backoff,
   * applies the delay, increments the retry count, and re-invokes the middleware.
   *
   * @param RequestInterface $request The HTTP request to retry
   * @param array $options Request options including retry count
   * @param ResponseInterface|null $response The failed response (if available)
   * @return PromiseInterface Promise for the retried request
   */
  protected function retryRequest(
    RequestInterface $request,
    array $options,
    ?ResponseInterface $response = null
  ): PromiseInterface {
    $options['retryCount']++;
    $delay = $options['baseDelayMs'] * pow($options['delayMultiplier'], $options['retryCount'] - 1);
    $delay = min($delay, $options['maxDelayMs']);
    if ($options['delayJitter'] > 0) {
      $delay += mt_rand(0, (int) $options['delayJitter']);
    }
    usleep((int) ($delay * 1000));
    return $this($request, $options);
  }
}
