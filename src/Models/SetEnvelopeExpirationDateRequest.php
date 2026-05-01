<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeExpirationDateRequest implements \JsonSerializable
{
  #[SerializedName('expires_at')]
  public ?float $expiresAt;

  public function __construct(?float $expiresAt = null)
  {
    $this->expiresAt = $expiresAt;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(expiresAt: $data['expires_at'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'expires_at' => $this->expiresAt
    ];

    foreach (['expires_at'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
