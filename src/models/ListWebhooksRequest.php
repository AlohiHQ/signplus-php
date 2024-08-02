<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListWebhooksRequest
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

    public function __construct(?string $webhookId = null, ?WebhookEvent $event = null)
    {
        $this->webhookId = $webhookId;
        $this->event = $event;
    }
}
