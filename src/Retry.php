<?php

declare(strict_types=1);

namespace Signplus;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Promise\Promise;
use Throwable;

class Retry
{
    private $retryOptions = [
        'isEnabled' => true,
        'maxRetries' => 3,
        'baseDelayMs' => 150,
        'maxDelayMs' => 5000,
        'delayJitter' => 50,
        'delayMultiplier' => 2,
        'retryableStatuses' => [408, 429, 500, 502, 503, 504],
        'retryableMethods' => ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'HEAD', 'OPTIONS'],
    ];

    private $handler;

    public static function factory(array $retryOptions = []): \Closure
    {
        return function (callable $handler) use ($retryOptions): self {
            return new static($handler, $retryOptions);
        };
    }

    public function __construct(callable $handler, array $retryOptions = [])
    {
        $this->handler = $handler;
        $this->retryOptions = array_replace($this->retryOptions, $retryOptions);
    }

    public function __invoke(RequestInterface $request, array $options): Promise
    {
        $options = array_replace($this->retryOptions, $options);
        $options['retryCount'] = $options['retryCount'] ?? 0;

        $next = $this->handler;
        return $next($request, $options)->then(
            $this->onSuccess($request, $options),
            $this->onFailure($request, $options)
        );
    }

    protected function onSuccess(RequestInterface $request, array $options): callable
    {
        return function (ResponseInterface $response) use ($request, $options) {
            return $this->shouldRetry($options, $request, $response)
                ? $this->retryRequest($request, $options, $response)
                : $response;
        };
    }

    protected function onFailure(RequestInterface $request, array $options): callable
    {
        return function (Throwable $exception) use ($request, $options): Promise {
            if ($exception instanceof \GuzzleHttp\Exception\RequestException) {
                $response = $exception->getResponse();
                if ($response && $this->shouldRetry($options, $request, $response)) {
                    return $this->retryRequest($request, $options, $response);
                }
            }

            return \GuzzleHttp\Promise\Create::rejectionFor($exception);
        };
    }

    protected function shouldRetry(array $options, RequestInterface $request, ResponseInterface $response): bool
    {
        if (!$options['isEnabled'] || !in_array($request->getMethod(), $options['retryableMethods'], true)) {
            return false;
        }

        $statusCode = $response->getStatusCode();
        return in_array($statusCode, $options['retryableStatuses'], true) &&
            $options['retryCount'] < $options['maxRetries'];
    }

    protected function retryRequest(
        RequestInterface $request,
        array $options,
        ResponseInterface $response = null
    ): Promise {
        echo "Retrying request\n";
        $options['retryCount']++;
        $delay = min(
            $options['baseDelayMs'] * pow($options['delayMultiplier'], $options['retryCount']),
            $options['maxDelayMs']
        );
        usleep($delay * 1000);
        return $this($request, $options);
    }
}
