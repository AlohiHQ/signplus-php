<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeCommentRequest implements \JsonSerializable
{
  #[SerializedName('comment')]
  public ?string $comment;

  public function __construct(?string $comment = null)
  {
    $this->comment = $comment;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(comment: $data['comment'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'comment' => $this->comment
    ];

    foreach (['comment'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
