<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class RenameEnvelopeRequest implements \JsonSerializable
{
  #[SerializedName('name')]
  public ?string $name;

  public function __construct(?string $name = null)
  {
    $this->name = $name;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(name: $data['name'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'name' => $this->name
    ];

    foreach (['name'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
