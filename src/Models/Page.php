<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Page implements \JsonSerializable
{
  /**
   * Width of the page in pixels
   */
  #[SerializedName('width')]
  public ?int $width;

  /**
   * Height of the page in pixels
   */
  #[SerializedName('height')]
  public ?int $height;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(?int $width = null, ?int $height = null)
  {
    $this->width = $width;
    $this->height = $height;

    if ($width !== null) {
      $this->_dirtyFields['width'] = true;
    }
    if ($height !== null) {
      $this->_dirtyFields['height'] = true;
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
    $instance = new self(width: $data['width'] ?? null, height: $data['height'] ?? null);
    $instance->_dirtyFields = [];
    foreach (['width', 'height'] as $field) {
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
    if (array_key_exists('width', $this->_dirtyFields)) {
      $result['width'] = $this->width;
    }
    if (array_key_exists('height', $this->_dirtyFields)) {
      $result['height'] = $this->height;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'width',
        'contents' => (string) $this->width
      ],

      [
        'name' => 'height',
        'contents' => (string) $this->height
      ]
    ];
  }

  public function validate(): void
  {
  }
}
