<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateEnvelopeRequest implements \JsonSerializable
{
  #[SerializedName('name')]
  public ?string $name;

  #[SerializedName('legality_level')]
  public ?string $legalityLevel;

  #[SerializedName('expires_at')]
  public ?string $expiresAt;

  #[SerializedName('comment')]
  public ?string $comment;

  #[SerializedName('sandbox')]
  public ?bool $sandbox;

  public function __construct(
    ?string $name = null,
    ?string $legalityLevel = null,
    ?string $expiresAt = null,
    ?string $comment = null,
    ?bool $sandbox = null
  ) {
    $this->name = $name;
    $this->legalityLevel = $legalityLevel;
    $this->expiresAt = $expiresAt;
    $this->comment = $comment;
    $this->sandbox = $sandbox;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      name: $data['name'] ?? null,
      legalityLevel: $data['legality_level'] ?? null,
      expiresAt: $data['expires_at'] ?? null,
      comment: $data['comment'] ?? null,
      sandbox: $data['sandbox'] ?? null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'name' => $this->name,
      'legality_level' => $this->legalityLevel,
      'expires_at' => $this->expiresAt,
      'comment' => $this->comment,
      'sandbox' => $this->sandbox
    ];

    foreach (['name', 'legality_level', 'expires_at', 'comment', 'sandbox'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
