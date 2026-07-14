<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;
use Signplus\Utils\Validator;

class CreateEnvelopeFromTemplateRequest implements \JsonSerializable
{
  /**
   * Name of the envelope
   */
  #[SerializedName('name')]
  public string $name;

  /**
   * Comment for the envelope
   */
  #[SerializedName('comment')]
  public ?string $comment;

  /**
   * Whether the envelope is created in sandbox mode
   */
  #[SerializedName('sandbox')]
  public ?bool $sandbox;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(string $name, ?string $comment = null, ?bool $sandbox = null)
  {
    $this->name = $name;
    $this->comment = $comment;
    $this->sandbox = $sandbox;

    $this->_dirtyFields = [
      'name' => true
    ];
    if ($comment !== null) {
      $this->_dirtyFields['comment'] = true;
    }
    if ($sandbox !== null) {
      $this->_dirtyFields['sandbox'] = true;
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
      name: $data['name'],
      comment: $data['comment'] ?? null,
      sandbox: $data['sandbox'] ?? null
    );
    $instance->_dirtyFields = [];
    foreach (['name', 'comment', 'sandbox'] as $field) {
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
    $result['name'] = $this->name;
    if (array_key_exists('comment', $this->_dirtyFields)) {
      $result['comment'] = $this->comment;
    }
    if (array_key_exists('sandbox', $this->_dirtyFields)) {
      $result['sandbox'] = $this->sandbox;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'name',
        'contents' => $this->name
      ],

      [
        'name' => 'comment',
        'contents' => $this->comment
      ],

      [
        'name' => 'sandbox',
        'contents' => $this->sandbox ? 'true' : 'false'
      ]
    ];
  }

  public function validate(): void
  {
    Validator::validateString(
      $this->name,
      'name',
      minLength: 2,
      maxLength: 256,
      pattern: '^[a-zA-Z0-9][a-zA-Z0-9 ]*[a-zA-Z0-9]$'
    );
  }
}
