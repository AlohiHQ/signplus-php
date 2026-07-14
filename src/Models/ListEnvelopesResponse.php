<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListEnvelopesResponse implements \JsonSerializable
{
  /**
   * Whether there is a next page
   */
  #[SerializedName('has_next_page')]
  public ?bool $hasNextPage;

  /**
   * Whether there is a previous page
   */
  #[SerializedName('has_previous_page')]
  public ?bool $hasPreviousPage;

  /**
   * @var Envelope[]|null
   */
  #[SerializedName('envelopes')]
  public ?array $envelopes;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?bool $hasNextPage = null,
    ?bool $hasPreviousPage = null,
    ?array $envelopes = null
  ) {
    $this->hasNextPage = $hasNextPage;
    $this->hasPreviousPage = $hasPreviousPage;
    $this->envelopes = $envelopes ?? [];

    if ($hasNextPage !== null) {
      $this->_dirtyFields['has_next_page'] = true;
    }
    if ($hasPreviousPage !== null) {
      $this->_dirtyFields['has_previous_page'] = true;
    }
    if ($envelopes !== null) {
      $this->_dirtyFields['envelopes'] = true;
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
      hasNextPage: $data['has_next_page'] ?? null,
      hasPreviousPage: $data['has_previous_page'] ?? null,
      envelopes: isset($data['envelopes']) && is_array($data['envelopes'])
        ? array_map(
          fn($item) => is_array($item) ? Envelope::fromArray($item) : $item,
          $data['envelopes']
        )
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['has_next_page', 'has_previous_page', 'envelopes'] as $field) {
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
    if (array_key_exists('has_next_page', $this->_dirtyFields)) {
      $result['has_next_page'] = $this->hasNextPage;
    }
    if (array_key_exists('has_previous_page', $this->_dirtyFields)) {
      $result['has_previous_page'] = $this->hasPreviousPage;
    }
    if (array_key_exists('envelopes', $this->_dirtyFields)) {
      $result['envelopes'] = $this->envelopes;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'hasNextPage',
        'contents' => $this->hasNextPage ? 'true' : 'false'
      ],

      [
        'name' => 'hasPreviousPage',
        'contents' => $this->hasPreviousPage ? 'true' : 'false'
      ],

      [
        'name' => 'envelopes',
        'contents' => json_encode($this->envelopes)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->envelopes ?? [] as $item) {
      $item->validate();
    }
  }
}
