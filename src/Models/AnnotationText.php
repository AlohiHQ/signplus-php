<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Text annotation (null if annotation is not a text)
 */
class AnnotationText implements \JsonSerializable
{
  /**
   * Font size of the text in pt
   */
  #[SerializedName('size')]
  public ?float $size;

  /**
   * Text color in 32bit representation
   */
  #[SerializedName('color')]
  public ?float $color;

  /**
   * Text content of the annotation
   */
  #[SerializedName('value')]
  public ?string $value;

  /**
   * Tooltip of the annotation
   */
  #[SerializedName('tooltip')]
  public ?string $tooltip;

  /**
   * Name of the dynamic field
   */
  #[SerializedName('dynamic_field_name')]
  public ?string $dynamicFieldName;

  #[SerializedName('font')]
  public ?AnnotationFont $font;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?float $size = null,
    ?float $color = null,
    ?string $value = null,
    ?string $tooltip = null,
    ?string $dynamicFieldName = null,
    ?AnnotationFont $font = null
  ) {
    $this->size = $size;
    $this->color = $color;
    $this->value = $value;
    $this->tooltip = $tooltip;
    $this->dynamicFieldName = $dynamicFieldName;
    $this->font = $font;

    if ($size !== null) {
      $this->_dirtyFields['size'] = true;
    }
    if ($color !== null) {
      $this->_dirtyFields['color'] = true;
    }
    if ($value !== null) {
      $this->_dirtyFields['value'] = true;
    }
    if ($tooltip !== null) {
      $this->_dirtyFields['tooltip'] = true;
    }
    if ($dynamicFieldName !== null) {
      $this->_dirtyFields['dynamic_field_name'] = true;
    }
    if ($font !== null) {
      $this->_dirtyFields['font'] = true;
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
      color: $data['color'] ?? null,
      value: $data['value'] ?? null,
      tooltip: $data['tooltip'] ?? null,
      dynamicFieldName: $data['dynamic_field_name'] ?? null,
      font: isset($data['font']) && is_array($data['font'])
        ? AnnotationFont::fromArray($data['font'])
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['size', 'color', 'value', 'tooltip', 'dynamic_field_name', 'font'] as $field) {
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
    if (array_key_exists('color', $this->_dirtyFields)) {
      $result['color'] = $this->color;
    }
    if (array_key_exists('value', $this->_dirtyFields)) {
      $result['value'] = $this->value;
    }
    if (array_key_exists('tooltip', $this->_dirtyFields)) {
      $result['tooltip'] = $this->tooltip;
    }
    if (array_key_exists('dynamic_field_name', $this->_dirtyFields)) {
      $result['dynamic_field_name'] = $this->dynamicFieldName;
    }
    if (array_key_exists('font', $this->_dirtyFields)) {
      $result['font'] = $this->font;
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
        'name' => 'color',
        'contents' => (string) $this->color
      ],

      [
        'name' => 'value',
        'contents' => $this->value
      ],

      [
        'name' => 'tooltip',
        'contents' => $this->tooltip
      ],

      [
        'name' => 'dynamicFieldName',
        'contents' => $this->dynamicFieldName
      ],

      [
        'name' => 'font',
        'contents' => json_encode($this->font)
      ]
    ];
  }

  public function validate(): void
  {
    $this->font?->validate();
  }
}
