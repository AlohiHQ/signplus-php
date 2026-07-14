<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeLegalityLevelRequest implements \JsonSerializable
{
  /**
   * Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes)
   */
  #[SerializedName('legality_level')]
  public ?EnvelopeLegalityLevel $legalityLevel;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(?EnvelopeLegalityLevel $legalityLevel = null)
  {
    $this->legalityLevel = $legalityLevel;

    if ($legalityLevel !== null) {
      $this->_dirtyFields['legality_level'] = true;
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
      legalityLevel: isset($data['legality_level']) &&
      (is_string($data['legality_level']) || is_int($data['legality_level']))
        ? EnvelopeLegalityLevel::tryFrom($data['legality_level'])
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['legality_level'] as $field) {
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
    if (array_key_exists('legality_level', $this->_dirtyFields)) {
      $result['legality_level'] = $this->legalityLevel;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'legalityLevel',
        'contents' => json_encode($this->legalityLevel)
      ]
    ];
  }

  public function validate(): void
  {
  }
}
