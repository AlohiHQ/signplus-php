<?php

declare(strict_types=1);

namespace Signplus\Exceptions;

use InvalidArgumentException;

/**
 * Exception thrown when a request parameter fails validation against its schema constraints.
 *
 * Contains the failing field name and the specific constraint violation message.
 */
class ValidationException extends InvalidArgumentException
{
  /**
   * Create a new ValidationException instance.
   *
   * @param string $field   The name of the field that failed validation
   * @param string $message Description of the constraint violation
   */
  public function __construct(public readonly string $field, string $message)
  {
    parent::__construct("Invalid value for '$field': $message");
  }
}
