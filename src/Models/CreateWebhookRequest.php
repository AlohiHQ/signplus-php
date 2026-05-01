<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateWebhookRequest implements \JsonSerializable
{
  #[SerializedName('event')]
  public ?string $event;

  #[SerializedName('target')]
  public ?string $target;

  public function __construct(?string $event = null, ?string $target = null)
  {
    $this->event = $event;
    $this->target = $target;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(event: $data['event'] ?? null, target: $data['target'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'event' => $this->event,
      'target' => $this->target
    ];

    foreach (['event', 'target'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
