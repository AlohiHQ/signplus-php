<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListWebhooksRequest implements \JsonSerializable
{
  /**
   * ID of the webhook
   */
  #[SerializedName('webhook_id')]
  public ?string $webhookId;

  /**
   * Event of the webhook
   */
  #[SerializedName('event')]
  public ?WebhookEvent $event;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(?string $webhookId = null, ?WebhookEvent $event = null)
  {
    $this->webhookId = $webhookId;
    $this->event = $event;

    if ($webhookId !== null) {
      $this->_dirtyFields['webhook_id'] = true;
    }
    if ($event !== null) {
      $this->_dirtyFields['event'] = true;
    }
  }

  /**
   * Mark one or more optional fields as explicitly set so they are
   * included in {@see jsonSerialize()} output.
   *
   * Constructor-created objects automatically track required fields and
   * any optional field passed with a non-default value. Use this method
   * to force-include a field that was left at its default (e.g. explicit null):
   *
   *     $pet = new Pet(name: 'Buddy');
   *     $pet->setFields('tag'); // tag (null) will now appear in JSON
   *
   * Objects created via {@see fromArray()} already track every field
   * present in the input data, so setFields() is not needed for them.
   *
   * @param string ...$fields JSON field names (original API names) to mark as set
   * @return static
   */
  public function setFields(string ...$fields): static
  {
    foreach ($fields as $field) {
      $this->_dirtyFields[$field] = true;
    }
    return $this;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(
      webhookId: $data['webhook_id'] ?? null,
      event: isset($data['event']) && (is_string($data['event']) || is_int($data['event']))
        ? WebhookEvent::tryFrom($data['event'])
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['webhook_id', 'event'] as $field) {
      if (array_key_exists($field, $data)) {
        $instance->_dirtyFields[$field] = true;
      }
    }
    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    if (array_key_exists('webhook_id', $this->_dirtyFields)) {
      $result['webhook_id'] = $this->webhookId;
    }
    if (array_key_exists('event', $this->_dirtyFields)) {
      $result['event'] = $this->event;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'webhookId',
        'contents' => $this->webhookId
      ],

      [
        'name' => 'event',
        'contents' => json_encode($this->event)
      ]
    ];
  }

  public function validate(): void
  {
  }
}
