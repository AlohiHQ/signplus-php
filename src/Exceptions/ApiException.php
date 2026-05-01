<?php

declare(strict_types=1);

namespace Signplus\Exceptions;

use Exception;
use Throwable;

/**
 * Exception thrown when an API request returns an error response.
 *
 * Contains the HTTP status code, error message, response body, and response headers.
 * This exception wraps HTTP client errors to provide a consistent error handling
 * interface across all SDK service methods.
 */
class ApiException extends Exception
{
  /**
   * Create a new ApiException instance.
   *
   * @param string $message The error message
   * @param int $statusCode The HTTP status code
   * @param string $responseBody The raw response body
   * @param array $responseHeaders The response headers
   * @param Throwable|null $previous The previous exception for chaining
   */
  public function __construct(
    string $message,
    public readonly int $statusCode,
    public readonly string $responseBody = '',
    public readonly array $responseHeaders = [],
    ?Throwable $previous = null
  ) {
    parent::__construct($message, $statusCode, $previous);
  }

  /**
   * Try to decode the response body as JSON.
   *
   * Returns the decoded data as an associative array, or null if the response
   * body is empty or not valid JSON.
   *
   * @return mixed The decoded JSON data or null
   */
  public function getDecodedBody(): mixed
  {
    if ($this->responseBody === '') {
      return null;
    }
    $decoded = json_decode($this->responseBody, true);
    return json_last_error() === JSON_ERROR_NONE ? $decoded : null;
  }
}
