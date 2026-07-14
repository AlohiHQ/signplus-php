<?php

namespace Signplus\Exceptions;

use Throwable;

/**
 * Exception thrown when an API request exceeds the configured timeout.
 *
 * This exception is raised when the underlying HTTP client detects a
 * cURL timeout (error 28 — CURLE_OPERATION_TIMEDOUT). Callers can
 * catch this type specifically to distinguish timeouts from other
 * transport failures.
 */
class TimeoutException extends ApiException
{
  public function __construct(string $message, ?Throwable $previous = null)
  {
    parent::__construct(message: $message, statusCode: 0, previous: $previous);
  }
}
