<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListEnvelopeDocumentsResponse implements \JsonSerializable
{
  /**
   * @var Document[]|null
   */
  #[SerializedName('documents')]
  public ?array $documents;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(?array $documents = null)
  {
    $this->documents = $documents ?? [];

    if ($documents !== null) {
      $this->_dirtyFields['documents'] = true;
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
      documents: isset($data['documents']) && is_array($data['documents'])
        ? array_map(
          fn($item) => is_array($item) ? Document::fromArray($item) : $item,
          $data['documents']
        )
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['documents'] as $field) {
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
    if (array_key_exists('documents', $this->_dirtyFields)) {
      $result['documents'] = $this->documents;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'documents',
        'contents' => json_encode($this->documents)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->documents ?? [] as $item) {
      $item->validate();
    }
  }
}
