<?php

declare(strict_types=1);

namespace Signplus\Utils;

use Signplus\Exceptions\ValidationException;

/**
 * Static utility class for validating request parameters against OpenAPI schema constraints.
 *
 * Each method silently returns when the value is null (null-safe), allowing callers
 * to skip separate null checks for optional parameters.
 */
class Validator
{
  /**
   * Validate a string value against length and pattern constraints.
   *
   * @param mixed       $value     The value to validate
   * @param string      $field     The field name (for error messages)
   * @param int|null    $minLength Minimum allowed length
   * @param int|null    $maxLength Maximum allowed length
   * @param string|null $pattern   Regex pattern the value must match
   */
  public static function validateString(
    mixed $value,
    string $field,
    ?int $minLength = null,
    ?int $maxLength = null,
    ?string $pattern = null
  ): void {
    if ($value === null) {
      return;
    }

    $strValue = (string) $value;

    if ($minLength !== null && mb_strlen($strValue) < $minLength) {
      throw new ValidationException($field, "must be at least $minLength characters long");
    }

    if ($maxLength !== null && mb_strlen($strValue) > $maxLength) {
      throw new ValidationException($field, "must be at most $maxLength characters long");
    }

    if (
      $pattern !== null &&
      !preg_match('/' . str_replace('/', '\\/', $pattern) . '/', $strValue)
    ) {
      throw new ValidationException($field, "must match pattern $pattern");
    }
  }

  /**
   * Validate a numeric value against min, max, and multipleOf constraints.
   *
   * @param mixed      $value        The value to validate
   * @param string     $field        The field name (for error messages)
   * @param float|null $min          Minimum value (inclusive unless $minExclusive is true)
   * @param bool       $minExclusive Whether the minimum boundary is exclusive
   * @param float|null $max          Maximum value (inclusive unless $maxExclusive is true)
   * @param bool       $maxExclusive Whether the maximum boundary is exclusive
   * @param float|null $multipleOf   Value must be a multiple of this number
   */
  public static function validateNumber(
    mixed $value,
    string $field,
    ?float $min = null,
    bool $minExclusive = false,
    ?float $max = null,
    bool $maxExclusive = false,
    ?float $multipleOf = null
  ): void {
    if ($value === null) {
      return;
    }

    if ($min !== null) {
      if ($minExclusive && $value <= $min) {
        throw new ValidationException($field, "must be > $min");
      }
      if (!$minExclusive && $value < $min) {
        throw new ValidationException($field, "must be >= $min");
      }
    }

    if ($max !== null) {
      if ($maxExclusive && $value >= $max) {
        throw new ValidationException($field, "must be < $max");
      }
      if (!$maxExclusive && $value > $max) {
        throw new ValidationException($field, "must be <= $max");
      }
    }

    if ($multipleOf !== null) {
      $remainder = fmod(abs((float) $value), $multipleOf);
      if (
        $remainder > PHP_FLOAT_EPSILON * abs($multipleOf) &&
        abs($remainder - $multipleOf) > PHP_FLOAT_EPSILON * abs($multipleOf)
      ) {
        throw new ValidationException($field, "must be a multiple of $multipleOf");
      }
    }
  }

  /**
   * Validate an array value against item count and uniqueness constraints.
   *
   * @param mixed    $value       The value to validate
   * @param string   $field       The field name (for error messages)
   * @param int|null $minItems    Minimum number of items
   * @param int|null $maxItems    Maximum number of items
   * @param bool     $uniqueItems Whether all items must be unique
   */
  public static function validateArray(
    mixed $value,
    string $field,
    ?int $minItems = null,
    ?int $maxItems = null,
    bool $uniqueItems = false
  ): void {
    if ($value === null) {
      return;
    }

    if ($minItems !== null && count($value) < $minItems) {
      throw new ValidationException($field, "must have at least $minItems items");
    }

    if ($maxItems !== null && count($value) > $maxItems) {
      throw new ValidationException($field, "must have at most $maxItems items");
    }

    if ($uniqueItems && count($value) !== count(array_unique($value, SORT_REGULAR))) {
      throw new ValidationException($field, 'must contain unique items');
    }
  }
}
