<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class TemplateSigningStep implements \JsonSerializable
{
  /**
   * @var TemplateRecipient[]|null
   * List of recipients
   */
  #[SerializedName('recipients')]
  public ?array $recipients;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(?array $recipients = null)
  {
    $this->recipients = $recipients ?? [];

    if ($recipients !== null) {
      $this->_dirtyFields['recipients'] = true;
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
      recipients: isset($data['recipients']) && is_array($data['recipients'])
        ? array_map(
          fn($item) => is_array($item) ? TemplateRecipient::fromArray($item) : $item,
          $data['recipients']
        )
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['recipients'] as $field) {
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
    if (array_key_exists('recipients', $this->_dirtyFields)) {
      $result['recipients'] = $this->recipients;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'recipients',
        'contents' => json_encode($this->recipients)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->recipients ?? [] as $item) {
      $item->validate();
    }
  }
}
