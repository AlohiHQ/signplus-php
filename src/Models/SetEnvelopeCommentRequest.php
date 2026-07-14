<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeCommentRequest implements \JsonSerializable
{
  /**
   * Comment for the envelope
   */
  #[SerializedName('comment')]
  public string $comment;

  public function __construct(string $comment)
  {
    $this->comment = $comment;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(comment: $data['comment']);

    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    $result['comment'] = $this->comment;
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'comment',
        'contents' => $this->comment
      ]
    ];
  }

  public function validate(): void
  {
  }
}
