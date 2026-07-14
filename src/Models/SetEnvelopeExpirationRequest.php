<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeExpirationRequest implements \JsonSerializable
{
  /**
   * Unix timestamp of the expiration date
   */
  #[SerializedName('expires_at')]
  public int $expiresAt;

  public function __construct(int $expiresAt)
  {
    $this->expiresAt = $expiresAt;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(expiresAt: $data['expires_at']);

    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    $result['expires_at'] = $this->expiresAt;
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'expiresAt',
        'contents' => (string) $this->expiresAt
      ]
    ];
  }

  public function validate(): void
  {
  }
}
