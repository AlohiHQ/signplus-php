<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AttachmentPlaceholderRequest implements \JsonSerializable
{
  /**
   * ID of the recipient
   */
  #[SerializedName('recipient_id')]
  public string $recipientId;

  /**
   * ID of the attachment placeholder
   */
  #[SerializedName('id')]
  public ?string $id;

  #[SerializedName('name')]
  public string $name;

  /**
   * Hint of the attachment placeholder
   */
  #[SerializedName('hint')]
  public ?string $hint;

  /**
   * Whether the attachment placeholder is required
   */
  #[SerializedName('required')]
  public bool $required;

  #[SerializedName('multiple')]
  public bool $multiple;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    string $recipientId,
    string $name,
    bool $required,
    bool $multiple,
    ?string $id = null,
    ?string $hint = null
  ) {
    $this->recipientId = $recipientId;
    $this->id = $id;
    $this->name = $name;
    $this->hint = $hint;
    $this->required = $required;
    $this->multiple = $multiple;

    $this->_dirtyFields = [
      'recipient_id' => true,
      'name' => true,
      'required' => true,
      'multiple' => true
    ];
    if ($id !== null) {
      $this->_dirtyFields['id'] = true;
    }
    if ($hint !== null) {
      $this->_dirtyFields['hint'] = true;
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
      recipientId: $data['recipient_id'],
      id: $data['id'] ?? null,
      name: $data['name'],
      hint: $data['hint'] ?? null,
      required: $data['required'],
      multiple: $data['multiple']
    );
    $instance->_dirtyFields = [];
    foreach (['recipient_id', 'id', 'name', 'hint', 'required', 'multiple'] as $field) {
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
    $result['recipient_id'] = $this->recipientId;
    if (array_key_exists('id', $this->_dirtyFields)) {
      $result['id'] = $this->id;
    }
    $result['name'] = $this->name;
    if (array_key_exists('hint', $this->_dirtyFields)) {
      $result['hint'] = $this->hint;
    }
    $result['required'] = $this->required;
    $result['multiple'] = $this->multiple;
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
      ]
    ];
  }

  public function validate(): void
  {
  }
}
