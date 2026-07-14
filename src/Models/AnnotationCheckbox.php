<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Checkbox annotation (null if annotation is not a checkbox)
 */
class AnnotationCheckbox implements \JsonSerializable
{
  /**
   * Whether the checkbox is checked
   */
  #[SerializedName('checked')]
  public ?bool $checked;

  /**
   * Style of the checkbox
   */
  #[SerializedName('style')]
  public ?AnnotationCheckboxStyle $style;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(?bool $checked = null, ?AnnotationCheckboxStyle $style = null)
  {
    $this->checked = $checked;
    $this->style = $style;

    if ($checked !== null) {
      $this->_dirtyFields['checked'] = true;
    }
    if ($style !== null) {
      $this->_dirtyFields['style'] = true;
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
      checked: $data['checked'] ?? null,
      style: isset($data['style']) && (is_string($data['style']) || is_int($data['style']))
        ? AnnotationCheckboxStyle::tryFrom($data['style'])
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['checked', 'style'] as $field) {
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
    if (array_key_exists('checked', $this->_dirtyFields)) {
      $result['checked'] = $this->checked;
    }
    if (array_key_exists('style', $this->_dirtyFields)) {
      $result['style'] = $this->style;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'checked',
        'contents' => $this->checked ? 'true' : 'false'
      ],

      [
        'name' => 'style',
        'contents' => json_encode($this->style)
      ]
    ];
  }

  public function validate(): void
  {
  }
}
