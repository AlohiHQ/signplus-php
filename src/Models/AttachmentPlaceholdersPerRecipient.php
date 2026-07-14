<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AttachmentPlaceholdersPerRecipient implements \JsonSerializable
{
  /**
   * ID of the recipient
   */
  #[SerializedName('recipient_id')]
  public ?string $recipientId;

  /**
   * Name of the recipient
   */
  #[SerializedName('recipient_name')]
  public ?string $recipientName;

  /**
   * @var AttachmentPlaceholder[]|null
   */
  #[SerializedName('placeholders')]
  public ?array $placeholders;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?string $recipientId = null,
    ?string $recipientName = null,
    ?array $placeholders = null
  ) {
    $this->recipientId = $recipientId;
    $this->recipientName = $recipientName;
    $this->placeholders = $placeholders ?? [];

    if ($recipientId !== null) {
      $this->_dirtyFields['recipient_id'] = true;
    }
    if ($recipientName !== null) {
      $this->_dirtyFields['recipient_name'] = true;
    }
    if ($placeholders !== null) {
      $this->_dirtyFields['placeholders'] = true;
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
      recipientName: $data['recipient_name'] ?? null,
      placeholders: isset($data['placeholders']) && is_array($data['placeholders'])
        ? array_map(
          fn($item) => is_array($item) ? AttachmentPlaceholder::fromArray($item) : $item,
          $data['placeholders']
        )
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['recipient_id', 'recipient_name', 'placeholders'] as $field) {
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
    if (array_key_exists('recipient_name', $this->_dirtyFields)) {
      $result['recipient_name'] = $this->recipientName;
    }
    if (array_key_exists('placeholders', $this->_dirtyFields)) {
      $result['placeholders'] = $this->placeholders;
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
        'name' => 'recipientName',
        'contents' => $this->recipientName
      ],

      [
        'name' => 'placeholders',
        'contents' => json_encode($this->placeholders)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->placeholders ?? [] as $item) {
      $item->validate();
    }
  }
}
