<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AnnotationFont implements \JsonSerializable
{
  /**
   * Font family of the text
   */
  #[SerializedName('family')]
  public ?AnnotationFontFamily $family;

  /**
   * Whether the text is italic
   */
  #[SerializedName('italic')]
  public ?bool $italic;

  /**
   * Whether the text is bold
   */
  #[SerializedName('bold')]
  public ?bool $bold;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?AnnotationFontFamily $family = null,
    ?bool $italic = null,
    ?bool $bold = null
  ) {
    $this->family = $family;
    $this->italic = $italic;
    $this->bold = $bold;

    if ($family !== null) {
      $this->_dirtyFields['family'] = true;
    }
    if ($italic !== null) {
      $this->_dirtyFields['italic'] = true;
    }
    if ($bold !== null) {
      $this->_dirtyFields['bold'] = true;
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
      family: isset($data['family']) && (is_string($data['family']) || is_int($data['family']))
        ? AnnotationFontFamily::tryFrom($data['family'])
        : null,
      italic: $data['italic'] ?? null,
      bold: $data['bold'] ?? null
    );
    $instance->_dirtyFields = [];
    foreach (['family', 'italic', 'bold'] as $field) {
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
    if (array_key_exists('family', $this->_dirtyFields)) {
      $result['family'] = $this->family;
    }
    if (array_key_exists('italic', $this->_dirtyFields)) {
      $result['italic'] = $this->italic;
    }
    if (array_key_exists('bold', $this->_dirtyFields)) {
      $result['bold'] = $this->bold;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'family',
        'contents' => json_encode($this->family)
      ],

      [
        'name' => 'italic',
        'contents' => $this->italic ? 'true' : 'false'
      ],

      [
        'name' => 'bold',
        'contents' => $this->bold ? 'true' : 'false'
      ]
    ];
  }

  public function validate(): void
  {
  }
}
