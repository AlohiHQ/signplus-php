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
   * @param string $data JSON string to deserialize
   * @param string $class Fully qualified class name to deserialize into
   * @return mixed Instance of the specified class populated with data from JSON
   */
  public static function deserialize(string $data, string $class)
  {
    $context = [
      BackedEnumNormalizer::ALLOW_INVALID_VALUES => true
    ];

    return self::getSerializer()->deserialize($data, $class, 'json', $context);
  }

  /**
   * Serialize a PHP object to an associative array.
   *
   * Converts an object to an array representation, skipping null values.
   * First serializes to JSON, then decodes back to an array.
   *
   * @param mixed $object The object to serialize
   * @return array Associative array representation of the object
   */
  public static function serialize(mixed $object): array
  {
    $context = [
      ObjectNormalizer::SKIP_NULL_VALUES => true
    ];

    $json = self::getSerializer()->serialize($object, 'json', $context);
    return json_decode($json, true);
  }
}
