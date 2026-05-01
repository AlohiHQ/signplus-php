<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetTemplateAttachmentsSettingsRequestSettings implements \JsonSerializable
{
  #[SerializedName('visible_to_recipients')]
  public ?bool $visibleToRecipients;

  public function __construct(?bool $visibleToRecipients = null)
  {
    $this->visibleToRecipients = $visibleToRecipients;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(visibleToRecipients: $data['visible_to_recipients'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'visible_to_recipients' => $this->visibleToRecipients
    ];

    foreach (['visible_to_recipients'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
