<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AttachmentPlaceholderFile implements \JsonSerializable
{
  /**
   * ID of the file
   */
  #[SerializedName('id')]
  public ?string $id;

  /**
   * Name of the file
   */
  #[SerializedName('name')]
  public ?string $name;

  /**
   * Size of the file in bytes
   */
  #[SerializedName('size')]
  public ?int $size;

  /**
   * MIME type of the file
   */
  #[SerializedName('mimetype')]
  public ?string $mimetype;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?string $id = null,
    ?string $name = null,
    ?int $size = null,
    ?string $mimetype = null
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->size = $size;
    $this->mimetype = $mimetype;

    if ($id !== null) {
      $this->_dirtyFields['id'] = true;
    }
    if ($name !== null) {
      $this->_dirtyFields['name'] = true;
    }
    if ($size !== null) {
      $this->_dirtyFields['size'] = true;
    }
    if ($mimetype !== null) {
      $this->_dirtyFields['mimetype'] = true;
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
      id: $data['id'] ?? null,
      name: $data['name'] ?? null,
      size: $data['size'] ?? null,
      mimetype: $data['mimetype'] ?? null
    );
    $instance->_dirtyFields = [];
    foreach (['id', 'name', 'size', 'mimetype'] as $field) {
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
    if (array_key_exists('id', $this->_dirtyFields)) {
      $result['id'] = $this->id;
    }
    if (array_key_exists('name', $this->_dirtyFields)) {
      $result['name'] = $this->name;
    }
    if (array_key_exists('size', $this->_dirtyFields)) {
      $result['size'] = $this->size;
    }
    if (array_key_exists('mimetype', $this->_dirtyFields)) {
      $result['mimetype'] = $this->mimetype;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'id',
        'contents' => $this->id
      ],

      [
        'name' => 'name',
        'contents' => $this->name
      ],

      [
        'name' => 'size',
        'contents' => (string) $this->size
      ],

      [
        'name' => 'mimetype',
        'contents' => $this->mimetype
      ]
    ];
  }

  public function validate(): void
  {
  }
}
