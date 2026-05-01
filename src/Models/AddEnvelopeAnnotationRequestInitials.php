<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddEnvelopeAnnotationRequestInitials implements \JsonSerializable
{
  #[SerializedName('id')]
  public ?string $id;

  public function __construct(?string $id = null)
  {
    $this->id = $id;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(id: $data['id'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'id' => $this->id
    ];

    foreach (['id'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
