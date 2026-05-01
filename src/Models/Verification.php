<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Verification implements \JsonSerializable
{
  #[SerializedName('type')]
  public ?string $type;

  #[SerializedName('value')]
  public ?string $value;

  public function __construct(?string $type = null, ?string $value = null)
  {
    $this->type = $type;
    $this->value = $value;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(type: $data['type'] ?? null, value: $data['value'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'type' => $this->type,
      'value' => $this->value
    ];

    foreach (['type', 'value'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
