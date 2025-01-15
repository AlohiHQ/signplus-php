<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateWebhookRequest
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
}
