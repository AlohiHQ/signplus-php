<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeAttachmentsSettingsRequest implements \JsonSerializable
{
  #[SerializedName('settings')]
  public ?SetEnvelopeAttachmentsSettingsRequestSettings $settings;

  public function __construct(?SetEnvelopeAttachmentsSettingsRequestSettings $settings = null)
  {
    $this->settings = $settings;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      settings: isset($data['settings']) && is_array($data['settings'])
        ? SetEnvelopeAttachmentsSettingsRequestSettings::fromArray($data['settings'])
        : null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'settings' => $this->settings
    ];

    foreach (['settings'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
