<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeLegalityLevelRequest implements \JsonSerializable
{
  #[SerializedName('legality_level')]
  public ?string $legalityLevel;

  public function __construct(?string $legalityLevel = null)
  {
    $this->legalityLevel = $legalityLevel;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(legalityLevel: $data['legality_level'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'legality_level' => $this->legalityLevel
    ];

    foreach (['legality_level'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
