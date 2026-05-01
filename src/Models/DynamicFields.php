<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class DynamicFields implements \JsonSerializable
{
  #[SerializedName('name')]
  public ?string $name;

  #[SerializedName('value')]
  public ?string $value;

  public function __construct(?string $name = null, ?string $value = null)
  {
    $this->name = $name;
    $this->value = $value;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(name: $data['name'] ?? null, value: $data['value'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'name' => $this->name,
      'value' => $this->value
    ];

    foreach (['name', 'value'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
