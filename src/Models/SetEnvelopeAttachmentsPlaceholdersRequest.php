<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeAttachmentsPlaceholdersRequest implements \JsonSerializable
{
  /**
   * @var AttachmentPlaceholderRequest[]
   */
  #[SerializedName('placeholders')]
  public array $placeholders;

  public function __construct(array $placeholders)
  {
    $this->placeholders = $placeholders;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(
      placeholders: array_map(
        fn($item) => is_array($item) ? AttachmentPlaceholderRequest::fromArray($item) : $item,
        $data['placeholders']
      )
    );

    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    $result['placeholders'] = $this->placeholders;
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'placeholders',
        'contents' => json_encode($this->placeholders)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->placeholders as $item) {
      $item->validate();
    }
  }
}
