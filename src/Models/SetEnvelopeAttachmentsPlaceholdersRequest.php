<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeAttachmentsPlaceholdersRequest implements \JsonSerializable
{
  /**
   * @var SetEnvelopeAttachmentsPlaceholdersRequestPlaceholders[]|null
   */
  #[SerializedName('placeholders')]
  public ?array $placeholders;

  public function __construct(?array $placeholders = [])
  {
    $this->placeholders = $placeholders;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      placeholders: isset($data['placeholders']) && is_array($data['placeholders'])
        ? array_map(
          fn($item) => is_array($item)
            ? SetEnvelopeAttachmentsPlaceholdersRequestPlaceholders::fromArray($item)
            : $item,
          $data['placeholders']
        )
        : null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'placeholders' => $this->placeholders
    ];

    foreach (['placeholders'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
