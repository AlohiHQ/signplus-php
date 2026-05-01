<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateEnvelopeFromTemplateRequest implements \JsonSerializable
{
  #[SerializedName('name')]
  public ?string $name;

  #[SerializedName('comment')]
  public ?string $comment;

  #[SerializedName('sandbox')]
  public ?bool $sandbox;

  public function __construct(?string $name = null, ?string $comment = null, ?bool $sandbox = null)
  {
    $this->name = $name;
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
      'comment' => $this->comment,
      'sandbox' => $this->sandbox
    ];

    foreach (['name', 'comment', 'sandbox'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
