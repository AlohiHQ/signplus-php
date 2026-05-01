<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListWebhooksRequest implements \JsonSerializable
{
  #[SerializedName('webhook_id')]
  public ?string $webhookId;

  #[SerializedName('event')]
  public ?string $event;

  public function __construct(?string $webhookId = null, ?string $event = null)
  {
    $this->webhookId = $webhookId;
    $this->event = $event;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(webhookId: $data['webhook_id'] ?? null, event: $data['event'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'webhook_id' => $this->webhookId,
      'event' => $this->event
    ];

    foreach (['webhook_id', 'event'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
