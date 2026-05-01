<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeAttachmentsPlaceholdersRequestPlaceholders implements \JsonSerializable
{
  #[SerializedName('recipient_id')]
  public ?string $recipientId;

  #[SerializedName('name')]
  public ?string $name;

  #[SerializedName('required')]
  public ?string $required;

  #[SerializedName('multiple')]
  public ?string $multiple;

  #[SerializedName('id')]
  public ?string $id;

  #[SerializedName('hint')]
  public ?string $hint;

  public function __construct(
    ?string $recipientId = null,
    ?string $name = null,
    ?string $required = null,
    ?string $multiple = null,
    ?string $id = null,
    ?string $hint = null
  ) {
    $this->recipientId = $recipientId;
    $this->name = $name;
    $this->required = $required;
    $this->multiple = $multiple;
    $this->id = $id;
    $this->hint = $hint;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      recipientId: $data['recipient_id'] ?? null,
      name: $data['name'] ?? null,
      required: $data['required'] ?? null,
      multiple: $data['multiple'] ?? null,
      id: $data['id'] ?? null,
      hint: $data['hint'] ?? null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'recipient_id' => $this->recipientId,
      'name' => $this->name,
      'required' => $this->required,
      'multiple' => $this->multiple,
      'id' => $this->id,
      'hint' => $this->hint
    ];

    foreach (['recipient_id', 'name', 'required', 'multiple', 'id', 'hint'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
