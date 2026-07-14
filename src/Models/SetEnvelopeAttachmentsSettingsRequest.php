<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeAttachmentsSettingsRequest implements \JsonSerializable
{
  #[SerializedName('settings')]
  public AttachmentSettings $settings;

  public function __construct(AttachmentSettings $settings)
  {
    $this->settings = $settings;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(
      settings: isset($data['settings']) && is_array($data['settings'])
        ? AttachmentSettings::fromArray($data['settings'])
        : null
    );

    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    $result['settings'] = $this->settings;
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'settings',
        'contents' => json_encode($this->settings)
      ]
    ];
  }

  public function validate(): void
  {
    $this->settings->validate();
  }
}
