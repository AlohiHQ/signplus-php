<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Date annotation (null if annotation is not a date)
 */
class AnnotationDateTime implements \JsonSerializable
{
  /**
   * Font size of the text in pt
   */
  #[SerializedName('size')]
  public ?float $size;

  #[SerializedName('font')]
  public ?AnnotationFont $font;

  /**
   * Color of the text in hex format
   */
  #[SerializedName('color')]
  public ?string $color;

  /**
   * Whether the date should be automatically filled
   */
  #[SerializedName('auto_fill')]
  public ?bool $autoFill;

  /**
   * Timezone of the date
   */
  #[SerializedName('timezone')]
  public ?string $timezone;

  /**
   * Unix timestamp of the date
   */
  #[SerializedName('timestamp')]
  public ?int $timestamp;

  /**
   * Format of the date time (DMY_NUMERIC_SLASH is day/month/year with slashes, MDY_NUMERIC_SLASH is month/day/year with slashes, YMD_NUMERIC_SLASH is year/month/day with slashes, DMY_NUMERIC_DASH_SHORT is day/month/year with dashes, DMY_NUMERIC_DASH is day/month/year with dashes, YMD_NUMERIC_DASH is year/month/day with dashes, MDY_TEXT_DASH_SHORT is month/day/year with dashes, MDY_TEXT_SPACE_SHORT is month/day/year with spaces, MDY_TEXT_SPACE is month/day/year with spaces)
   */
  #[SerializedName('format')]
  public ?AnnotationDateTimeFormat $format;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?float $size = null,
    ?AnnotationFont $font = null,
    ?string $color = null,
    ?bool $autoFill = null,
    ?string $timezone = null,
    ?int $timestamp = null,
    ?AnnotationDateTimeFormat $format = null
  ) {
    $this->size = $size;
    $this->font = $font;
    $this->color = $color;
    $this->autoFill = $autoFill;
    $this->timezone = $timezone;
    $this->timestamp = $timestamp;
    $this->format = $format;

    if ($size !== null) {
      $this->_dirtyFields['size'] = true;
    }
    if ($font !== null) {
      $this->_dirtyFields['font'] = true;
    }
    if ($color !== null) {
      $this->_dirtyFields['color'] = true;
    }
    if ($autoFill !== null) {
      $this->_dirtyFields['auto_fill'] = true;
    }
    if ($timezone !== null) {
      $this->_dirtyFields['timezone'] = true;
    }
    if ($timestamp !== null) {
      $this->_dirtyFields['timestamp'] = true;
    }
    if ($format !== null) {
      $this->_dirtyFields['format'] = true;
    }
  }

  /**
   * Mark one or more optional fields as explicitly set so they are
   * included in {@see jsonSerialize()} output.
   *
   * Constructor-created objects automatically track required fields and
   * any optional field passed with a non-default value. Use this method
   * to force-include a field that was left at its default (e.g. explicit null):
   *
   *     $pet = new Pet(name: 'Buddy');
   *     $pet->setFields('tag'); // tag (null) will now appear in JSON
   *
   * Objects created via {@see fromArray()} already track every field
   * present in the input data, so setFields() is not needed for them.
   *
   * @param string ...$fields JSON field names (original API names) to mark as set
   * @return static
   */
  public function setFields(string ...$fields): static
  {
    foreach ($fields as $field) {
      $this->_dirtyFields[$field] = true;
    }
    return $this;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(
      size: $data['size'] ?? null,
      font: isset($data['font']) && is_array($data['font'])
        ? AnnotationFont::fromArray($data['font'])
        : null,
      color: $data['color'] ?? null,
      autoFill: $data['auto_fill'] ?? null,
      timezone: $data['timezone'] ?? null,
      timestamp: $data['timestamp'] ?? null,
      format: isset($data['format']) && (is_string($data['format']) || is_int($data['format']))
        ? AnnotationDateTimeFormat::tryFrom($data['format'])
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['size', 'font', 'color', 'auto_fill', 'timezone', 'timestamp', 'format'] as $field) {
      if (array_key_exists($field, $data)) {
        $instance->_dirtyFields[$field] = true;
      }
    }
    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    if (array_key_exists('size', $this->_dirtyFields)) {
      $result['size'] = $this->size;
    }
    if (array_key_exists('font', $this->_dirtyFields)) {
      $result['font'] = $this->font;
    }
    if (array_key_exists('color', $this->_dirtyFields)) {
      $result['color'] = $this->color;
    }
    if (array_key_exists('auto_fill', $this->_dirtyFields)) {
      $result['auto_fill'] = $this->autoFill;
    }
    if (array_key_exists('timezone', $this->_dirtyFields)) {
      $result['timezone'] = $this->timezone;
    }
    if (array_key_exists('timestamp', $this->_dirtyFields)) {
      $result['timestamp'] = $this->timestamp;
    }
    if (array_key_exists('format', $this->_dirtyFields)) {
      $result['format'] = $this->format;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'size',
        'contents' => (string) $this->size
      ],

      [
        'name' => 'font',
        'contents' => json_encode($this->font)
      ],

      [
        'name' => 'color',
        'contents' => $this->color
      ],

      [
        'name' => 'autoFill',
        'contents' => $this->autoFill ? 'true' : 'false'
      ],

      [
        'name' => 'timezone',
        'contents' => $this->timezone
      ],

      [
        'name' => 'timestamp',
        'contents' => (string) $this->timestamp
      ],

      [
        'name' => 'format',
        'contents' => json_encode($this->format)
      ]
    ];
  }

  public function validate(): void
  {
    $this->font?->validate();
  }
}
