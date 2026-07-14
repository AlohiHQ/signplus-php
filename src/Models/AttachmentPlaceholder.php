<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AttachmentPlaceholder implements \JsonSerializable
{
  /**
   * ID of the recipient
   */
  #[SerializedName('recipient_id')]
  public ?string $recipientId;

  /**
   * ID of the attachment placeholder
   */
  #[SerializedName('id')]
  public ?string $id;

  /**
   * Name of the attachment placeholder
   */
  #[SerializedName('name')]
  public ?string $name;

  /**
   * Hint of the attachment placeholder
   */
  #[SerializedName('hint')]
  public ?string $hint;

  /**
   * Whether the attachment placeholder is required
   */
  #[SerializedName('required')]
  public ?bool $required;

  /**
   * Whether the attachment placeholder can have multiple files
   */
  #[SerializedName('multiple')]
  public ?bool $multiple;

  /**
   * @var AttachmentPlaceholderFile[]|null
   */
  #[SerializedName('files')]
  public ?array $files;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?string $recipientId = null,
    ?string $id = null,
    ?string $name = null,
    ?string $hint = null,
    ?bool $required = null,
    ?bool $multiple = null,
    ?array $files = null
  ) {
    $this->recipientId = $recipientId;
    $this->id = $id;
    $this->name = $name;
    $this->hint = $hint;
    $this->required = $required;
    $this->multiple = $multiple;
    $this->files = $files ?? [];

    if ($recipientId !== null) {
      $this->_dirtyFields['recipient_id'] = true;
    }
    if ($id !== null) {
      $this->_dirtyFields['id'] = true;
    }
    if ($name !== null) {
      $this->_dirtyFields['name'] = true;
    }
    if ($hint !== null) {
      $this->_dirtyFields['hint'] = true;
    }
    if ($required !== null) {
      $this->_dirtyFields['required'] = true;
    }
    if ($multiple !== null) {
      $this->_dirtyFields['multiple'] = true;
    }
    if ($files !== null) {
      $this->_dirtyFields['files'] = true;
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
      recipientId: $data['recipient_id'] ?? null,
      id: $data['id'] ?? null,
      name: $data['name'] ?? null,
      hint: $data['hint'] ?? null,
      required: $data['required'] ?? null,
      multiple: $data['multiple'] ?? null,
      files: isset($data['files']) && is_array($data['files'])
        ? array_map(
          fn($item) => is_array($item) ? AttachmentPlaceholderFile::fromArray($item) : $item,
          $data['files']
        )
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['recipient_id', 'id', 'name', 'hint', 'required', 'multiple', 'files'] as $field) {
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
    if (array_key_exists('recipient_id', $this->_dirtyFields)) {
      $result['recipient_id'] = $this->recipientId;
    }
    if (array_key_exists('id', $this->_dirtyFields)) {
      $result['id'] = $this->id;
    }
    if (array_key_exists('name', $this->_dirtyFields)) {
      $result['name'] = $this->name;
    }
    if (array_key_exists('hint', $this->_dirtyFields)) {
      $result['hint'] = $this->hint;
    }
    if (array_key_exists('required', $this->_dirtyFields)) {
      $result['required'] = $this->required;
    }
    if (array_key_exists('multiple', $this->_dirtyFields)) {
      $result['multiple'] = $this->multiple;
    }
    if (array_key_exists('files', $this->_dirtyFields)) {
      $result['files'] = $this->files;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'recipientId',
        'contents' => $this->recipientId
      ],

      [
        'name' => 'id',
        'contents' => $this->id
      ],

      [
        'name' => 'name',
        'contents' => $this->name
      ],

      [
        'name' => 'hint',
        'contents' => $this->hint
      ],

      [
        'name' => 'required',
        'contents' => $this->required ? 'true' : 'false'
      ],

      [
        'name' => 'multiple',
        'contents' => $this->multiple ? 'true' : 'false'
      ],

      [
        'name' => 'files',
        'contents' => json_encode($this->files)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->files ?? [] as $item) {
      $item->validate();
    }
  }
}
