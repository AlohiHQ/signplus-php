<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddEnvelopeSigningStepsRequest implements \JsonSerializable
{
  /**
   * @var SigningStep[]|null
   * List of signing steps
   */
  #[SerializedName('signing_steps')]
  public ?array $signingSteps;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(?array $signingSteps = null)
  {
    $this->signingSteps = $signingSteps ?? [];

    if ($signingSteps !== null) {
      $this->_dirtyFields['signing_steps'] = true;
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
      signingSteps: isset($data['signing_steps']) && is_array($data['signing_steps'])
        ? array_map(
          fn($item) => is_array($item) ? SigningStep::fromArray($item) : $item,
          $data['signing_steps']
        )
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['signing_steps'] as $field) {
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
    if (array_key_exists('signing_steps', $this->_dirtyFields)) {
      $result['signing_steps'] = $this->signingSteps;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'signingSteps',
        'contents' => json_encode($this->signingSteps)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->signingSteps ?? [] as $item) {
      $item->validate();
    }
  }
}
