<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class RecipientVerification implements \JsonSerializable
{
  /**
	 * Type of verification the recipient must complete before accessing the envelope.

- `PASSCODE`: requires a code to be entered.  
- `SMS`: sends a code via SMS.  
- `ID_VERIFICATION`: prompts the recipient to complete an automated ID and selfie check.
	 */
  #[SerializedName('type')]
  public ?RecipientVerificationType $type;

  /**
	 * Required for `PASSCODE` and `SMS` verification.

- `PASSCODE`: code required by the recipient to sign the document.
- `SMS`: recipient's phone number.
- `ID_VERIFICATION`: leave empty.
	 */
  #[SerializedName('value')]
  public ?string $value;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(?RecipientVerificationType $type = null, ?string $value = null)
  {
    $this->type = $type;
    $this->value = $value;

    if ($type !== null) {
      $this->_dirtyFields['type'] = true;
    }
    if ($value !== null) {
      $this->_dirtyFields['value'] = true;
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
      type: isset($data['type']) && (is_string($data['type']) || is_int($data['type']))
        ? RecipientVerificationType::tryFrom($data['type'])
        : null,
      value: $data['value'] ?? null
    );
    $instance->_dirtyFields = [];
    foreach (['type', 'value'] as $field) {
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
    if (array_key_exists('type', $this->_dirtyFields)) {
      $result['type'] = $this->type;
    }
    if (array_key_exists('value', $this->_dirtyFields)) {
      $result['value'] = $this->value;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'type',
        'contents' => json_encode($this->type)
      ],

      [
        'name' => 'value',
        'contents' => $this->value
      ]
    ];
  }

  public function validate(): void
  {
  }
}
