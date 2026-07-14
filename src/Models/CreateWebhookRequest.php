<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateWebhookRequest implements \JsonSerializable
{
  /**
   * Event of the webhook
   */
  #[SerializedName('event')]
  public WebhookEvent $event;

  /**
   * URL of the webhook target
   */
  #[SerializedName('target')]
  public string $target;

  public function __construct(WebhookEvent $event, string $target)
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
    $instance = new self(
      event: isset($data['event']) ? WebhookEvent::from($data['event']) : null,
      target: $data['target']
    );

    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    $result['event'] = $this->event;
    $result['target'] = $this->target;
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'event',
        'contents' => json_encode($this->event)
      ],

      [
        'name' => 'target',
        'contents' => $this->target
      ]
    ];
  }

  public function validate(): void
  {
  }
}
