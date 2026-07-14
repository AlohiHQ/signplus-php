<?php

declare(strict_types=1);

namespace Signplus\Utils;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;

/**
 * JSON serialization and deserialization utility using Symfony Serializer.
 *
 * This class provides a centralized interface for converting between JSON strings
 * and PHP objects. It uses Symfony's serializer component configured with support
 * for attributes, enums, arrays, and PHPDoc type hints.
 *
 * The serializer is lazy-initialized and reused across all operations for performance.
 */
class Serializer
{
  /**
   * @var SymfonySerializer|null Cached serializer instance (lazy-initialized)
   */
  private static ?SymfonySerializer $serializer = null;

  /**
   * Get or create the Symfony serializer instance.
   *
   * Lazily initializes the serializer with configured normalizers and encoders
   * on first access, then reuses the same instance for all subsequent calls.
   *
   * @return SymfonySerializer Configured Symfony serializer
   */
  private static function getSerializer(): SymfonySerializer
  {
    if (self::$serializer === null) {
      $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
      $nameConverter = new MetadataAwareNameConverter($classMetadataFactory);
      $normalizers = [
        new BackedEnumNormalizer(),
        new ObjectNormalizer($classMetadataFactory, $nameConverter, null, new PhpDocExtractor()),
        new ArrayDenormalizer()
      ];
      self::$serializer = new SymfonySerializer($normalizers, [
        new JsonEncoder(),
        new JsonDecode()
      ]);
    }

    return self::$serializer;
  }

  /**
   * Deserialize JSON string into a PHP object.
   *
   * Converts a JSON string into an instance of the specified class using
   * Symfony's serializer with support for nested objects, arrays, and enums.
   *
   * Empty / whitespace-only bodies — 204 No Content, 200 with empty body,
   * or any operation whose successful response simply doesn't carry one —
   * are valid responses, not malformed JSON. Return `null` so the caller
   * can handle the no-data case explicitly, instead of surfacing
   * `Symfony\Component\Serializer\Exception\NotEncodableValueException:
   * Syntax error` thrown deep inside Symfony's JsonDecode.
   *
   * @param string $data JSON string to deserialize
   * @param string $class Fully qualified class name to deserialize into
   * @return mixed Instance of the specified class populated with data from JSON, or null on empty input
   */
  public static function deserialize(string $data, string $class)
  {
    if (trim($data) === '') {
      return null;
    }

    $context = [
      BackedEnumNormalizer::ALLOW_INVALID_VALUES => true
    ];

    try {
      return self::getSerializer()->deserialize($data, $class, 'json', $context);
    } catch (\Symfony\Component\Serializer\Exception\ExceptionInterface $e) {
      // The response didn't match the declared schema — a required field
      // the server omitted (MissingConstructorArguments), or a value
      // whose type drifted from the spec (NotNormalizableValue). Crashing
      // deep inside the serializer is never useful. Rebuild via the
      // model's tolerant fromArray() so callers with a strict class
      // return type still get an instance; otherwise return the decoded
      // payload, mirroring the empty-body handling above.
      $decoded = json_decode($data, true) ?? [];
      if (is_array($decoded) && class_exists($class) && method_exists($class, 'fromArray')) {
        return $class::fromArray($decoded);
      }
      return $decoded;
    }
  }

  /**
   * Serialize a PHP object to its native-typed representation.
   *
   * Objects round-trip through JSON and become associative arrays;
   * primitives (strings / numbers / booleans / null) round-trip as
   * themselves. The previous `: array` return type was a lie — a method
   * whose request body is a single primitive (a bare string ID, a bool
   * flag, etc.) would serialize to e.g. `"foo"`, json_decode would
   * return `"foo"`, and PHP would throw `TypeError: Return value must
   * be of type array, string returned`. Guzzle's `json` / `body`
   * options both accept any JSON-compatible value, so widening to
   * `mixed` keeps the existing object/array call sites working while
   * unblocking primitive bodies.
   *
   * @param mixed $object The object to serialize
   * @return mixed JSON-compatible representation (associative array for objects, primitive for scalars)
   */
  public static function serialize(mixed $object): mixed
  {
    $context = [
      ObjectNormalizer::SKIP_NULL_VALUES => true
    ];

    $json = self::getSerializer()->serialize($object, 'json', $context);
    return json_decode($json, true);
  }
}
