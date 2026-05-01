<?php

declare(strict_types=1);

namespace Signplus\Services;

use Signplus\Environment;
use Signplus\Exceptions\ApiException;
use Signplus\Retry;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Signplus\Utils\LineDecoder;

/**
 * Base service class providing core HTTP request functionality for all API services.
 *
 * This class handles HTTP client initialization, request execution, authentication,
 * retry logic, hooks, and streaming responses. All generated service classes extend
 * this base service to inherit common functionality.
 */
class BaseService
{
  protected \GuzzleHttp\Client $client;
  protected string $baseUrl;
  protected array $options;
  protected HandlerStack $stack;
  /** @var array|null Service-level configuration overrides */
  protected ?array $serviceConfig = null;

  protected string $tokenPrefix;

  public function __construct(
    string $accessToken,
    string $tokenPrefix = 'Bearer ',
    string $environment = Environment::Default,
    float $timeout = 10000,
    array $retryConfig = []
  ) {
    $this->tokenPrefix = $tokenPrefix;

    $this->options = [
      'headers' => [
        'User-Agent' => 'postman-codegen/1.1.2 alohi/signplus/3.0.0 (php)',
        'Authorization' => $this->tokenPrefix . $accessToken
      ]
    ];

    $this->baseUrl = $environment;

    $stack = HandlerStack::create();
    $stack->push(Retry::factory($retryConfig));

    $this->stack = $stack;

    $this->client = new Client([
      'handler' => $stack,
      'timeout' => $timeout / 1000
    ]);
  }

  /**
   * Send a synchronous HTTP request and return the response.
   *
   * This method merges service-level options with request-specific options,
   * applies configuration overrides, constructs the full URL, and executes the request.
   * If the request fails with an HTTP error, it wraps the error in an ApiException
   * containing the status code, response body, and headers.
   *
   * @param string $method HTTP method (GET, POST, PUT, DELETE, etc.)
   * @param string $uri Request URI path (relative to baseUrl)
   * @param array $options Additional request options (headers, body, query params, etc.)
   * @param array $resolvedConfig Resolved configuration from hierarchy
   * @return \Psr\Http\Message\ResponseInterface The HTTP response
   * @throws ApiException When the HTTP request returns an error response
   */
  protected function sendRequest(
    string $method,
    string $uri,
    array $options = [],
    array $resolvedConfig = []
  ): \Psr\Http\Message\ResponseInterface {
    $baseUrl = $this->getBaseUrl($resolvedConfig);
    $mergedOptions = $this->applyConfig($options, $resolvedConfig);
    try {
      return $this->client->request($method, $baseUrl . $uri, $mergedOptions);
    } catch (\GuzzleHttp\Exception\RequestException $e) {
      $this->wrapRequestException($e);
    }
  }

  /**
   * Send a streaming request and yield response chunks as they arrive.
   *
   * @param string $method HTTP method
   * @param string $uri Request URI
   * @param array $options Request options
   * @return \Generator Generator yielding response chunks
   */
  protected function sendStreamingRequest(
    string $method,
    string $uri,
    array $options = [],
    array $resolvedConfig = []
  ): \Generator {
    $baseUrl = $this->getBaseUrl($resolvedConfig);
    $options['stream'] = true;
    $mergedOptions = $this->applyConfig($options, $resolvedConfig);
    try {
      $response = $this->client->request($method, $baseUrl . $uri, $mergedOptions);
    } catch (\GuzzleHttp\Exception\RequestException $e) {
      $this->wrapRequestException($e);
    }

    $body = $response->getBody();
    $contentType = $response->getHeaderLine('Content-Type');
    $isEventStream = strpos($contentType, 'text/event-stream') !== false;

    $lineDecoder = new LineDecoder();

    // Stream chunks from the response body
    while (!$body->eof()) {
      $chunk = $body->read(1024);
      if ($chunk === '') {
        continue;
      }

      $lines = $lineDecoder->splitLines($chunk);
      foreach ($lines as $line) {
        if ($isEventStream) {
          // For event-stream, parse data: prefix
          $trimmedLine = trim($line);
          if (strpos($trimmedLine, 'data: ') === 0) {
            $data = substr($trimmedLine, 6);
            yield $data;
          }
        } else {
          // For regular JSON responses, yield the line as-is
          yield $line;
        }
      }
    }

    // Flush any remaining buffered data
    $remainingLines = $lineDecoder->flush();
    foreach ($remainingLines as $line) {
      if ($isEventStream) {
        $trimmedLine = trim($line);
        if (strpos($trimmedLine, 'data: ') === 0) {
          $data = substr($trimmedLine, 6);
          yield $data;
        }
      } else {
        yield $line;
      }
    }
  }

  /**
   * Send a streaming request and yield wrapped response chunks with headers.
   *
   * @param string $method HTTP method
   * @param string $uri Request URI
   * @param array $options Request options
   * @param callable $deserializer Function to deserialize each chunk into the expected type
   * @param string $responseWrapperClass The fully qualified class name for wrapping responses
   * @return \Generator Generator yielding wrapped response chunks
   */
  protected function sendWrappedStreamingRequest(
    string $method,
    string $uri,
    array $options,
    callable $deserializer,
    string $responseWrapperClass,
    string $metadataClass,
    array $resolvedConfig = []
  ): \Generator {
    $baseUrl = $this->getBaseUrl($resolvedConfig);
    $options['stream'] = true;
    $mergedOptions = $this->applyConfig($options, $resolvedConfig);
    try {
      $response = $this->client->request($method, $baseUrl . $uri, $mergedOptions);
    } catch (\GuzzleHttp\Exception\RequestException $e) {
      $this->wrapRequestException($e);
    }

    // Extract metadata once for all chunks
    $metadata = new $metadataClass(
      headers: $this->parseHeaders($response->getHeaders()),
      statusCode: $response->getStatusCode()
    );

    $body = $response->getBody();
    $contentType = $response->getHeaderLine('Content-Type');
    $isEventStream = strpos($contentType, 'text/event-stream') !== false;

    $lineDecoder = new LineDecoder();

    // Stream chunks from the response body
    while (!$body->eof()) {
      $chunk = $body->read(1024);
      if ($chunk === '') {
        continue;
      }

      $lines = $lineDecoder->splitLines($chunk);
      foreach ($lines as $line) {
        $data = null;
        if ($isEventStream) {
          // For event-stream, parse data: prefix
          $trimmedLine = trim($line);
          if (strpos($trimmedLine, 'data: ') === 0) {
            $data = substr($trimmedLine, 6);
          }
        } else {
          // For regular JSON responses, use the line as-is
          $data = $line;
        }

        if ($data !== null) {
          $deserializedData = $deserializer($data);
          yield new $responseWrapperClass(
            data: $deserializedData,
            raw: $response,
            metadata: $metadata
          );
        }
      }
    }

    // Flush any remaining buffered data
    $remainingLines = $lineDecoder->flush();
    foreach ($remainingLines as $line) {
      $data = null;
      if ($isEventStream) {
        $trimmedLine = trim($line);
        if (strpos($trimmedLine, 'data: ') === 0) {
          $data = substr($trimmedLine, 6);
        }
      } else {
        $data = $line;
      }

      if ($data !== null) {
        $deserializedData = $deserializer($data);
        yield new $responseWrapperClass(
          data: $deserializedData,
          raw: $response,
          metadata: $metadata
        );
      }
    }
  }

  /**
   * Wrap a Guzzle RequestException in an ApiException.
   *
   * Extracts the HTTP status code, response body, and headers from the response
   * (if available) and throws a new ApiException with the original exception chained.
   * For connection errors where no response exists, status code 0 is used.
   *
   * @param \GuzzleHttp\Exception\RequestException $e The original Guzzle exception
   * @return never
   * @throws ApiException Always thrown with details from the original exception
   */
  private function wrapRequestException(\GuzzleHttp\Exception\RequestException $e): never
  {
    $response = $e->getResponse();
    if ($response) {
      throw new ApiException(
        message: $e->getMessage(),
        statusCode: $response->getStatusCode(),
        responseBody: (string) $response->getBody(),
        responseHeaders: $response->getHeaders(),
        previous: $e
      );
    }
    throw new ApiException(message: $e->getMessage(), statusCode: 0, previous: $e);
  }

  /**
   * Parse and normalize HTTP response headers.
   *
   * Converts header values from arrays to single strings when only one value exists,
   * while preserving arrays for multi-value headers (e.g., Set-Cookie).
   *
   * @param array $headers Raw header array from response (name => array of values)
   * @return array Normalized headers (name => string or array)
   */
  protected function parseHeaders(array $headers): array
  {
    $parsed = [];
    foreach ($headers as $name => $values) {
      // Flatten single-value arrays, keep multi-value as array
      $parsed[$name] = count($values) === 1 ? $values[0] : $values;
    }
    return $parsed;
  }

  /**
   * Update the base URL for API requests.
   *
   * This method allows changing the API endpoint at runtime, useful for
   * switching environments or API versions.
   *
   * @param string $url The new base URL (e.g., 'https://api.example.com/v2')
   * @return void
   */
  public function setBaseUrl(string $url): void
  {
    $this->baseUrl = rtrim($url, '/');
  }

  /**
   * Set the request timeout in milliseconds.
   *
   * Updates the HTTP client with a new timeout value. This affects all subsequent
   * requests made through this service instance.
   *
   * @param float $timeout Timeout in milliseconds
   * @return void
   */
  public function setTimeout(float $timeout): void
  {
    $this->client = new Client([
      'handler' => $this->stack,
      'timeout' => $timeout / 1000
    ]);
  }

  /**
   * Set service-level configuration that applies to all methods in this service.
   *
   * Supported keys: 'baseUrl', 'timeout', 'accessToken', 'retryConfig'
   *
   * @param array $config Configuration overrides
   * @return $this
   */
  public function setConfig(array $config): static
  {
    $this->serviceConfig = $config;
    return $this;
  }

  /**
   * Resolve configuration from the hierarchy: requestConfig > methodConfig > serviceConfig > defaults.
   *
   * @param array|null $methodConfig Method-level configuration override
   * @param array|null $requestConfig Request-level configuration override
   * @return array Merged configuration with all overrides applied
   */
  protected function getResolvedConfig(
    ?array $methodConfig = null,
    ?array $requestConfig = null
  ): array {
    return array_replace($this->serviceConfig ?? [], $methodConfig ?? [], $requestConfig ?? []);
  }

  /**
   * Apply resolved configuration overrides to request options.
   *
   * @param array $options Request options to modify
   * @param array $resolvedConfig Resolved configuration from hierarchy
   * @return array Modified request options with config applied
   */
  protected function applyConfig(array $options, array $resolvedConfig): array
  {
    $mergedOptions = array_replace_recursive($this->options, $options);

    if (isset($resolvedConfig['timeout'])) {
      $mergedOptions['timeout'] = $resolvedConfig['timeout'] / 1000;
    }

    if (isset($resolvedConfig['accessToken'])) {
      $mergedOptions['headers']['Authorization'] =
        $this->tokenPrefix . $resolvedConfig['accessToken'];
    }

    if (isset($resolvedConfig['retryConfig']) && is_array($resolvedConfig['retryConfig'])) {
      $allowedRetryKeys = [
        'isEnabled',
        'maxRetries',
        'baseDelayMs',
        'maxDelayMs',
        'delayJitter',
        'delayMultiplier',
        'retryableStatuses',
        'retryableMethods'
      ];
      $mergedOptions = array_replace(
        $mergedOptions,
        array_intersect_key($resolvedConfig['retryConfig'], array_flip($allowedRetryKeys))
      );
    }

    return $mergedOptions;
  }

  /**
   * Get the base URL for a request, considering config overrides.
   *
   * @param array $resolvedConfig Resolved configuration from hierarchy
   * @return string The base URL to use
   */
  protected function getBaseUrl(array $resolvedConfig): string
  {
    return rtrim($resolvedConfig['baseUrl'] ?? $this->baseUrl, '/');
  }

  /**
   * Set the access token for Bearer authentication.
   *
   * Configures the Authorization header with the provided token,
   * prefixed with the appropriate token type (e.g., "Bearer ").
   *
   * @param string $accessToken The access token
   * @return void
   */
  public function setAccessToken(string $accessToken): void
  {
    $this->options['headers']['Authorization'] = $this->tokenPrefix . $accessToken;
  }
}
