<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Webhook
{
    /**
     * Unique identifier of the webhook
     */
    #[SerializedName('id')]
    public ?string $id;

    /**
     * Event of the webhook
     */
    #[SerializedName('event')]
    public ?WebhookEvent $event;

    /**
     * Target URL of the webhook
     */
    #[SerializedName('target')]
    public ?string $target;

    public function __construct(?string $id = null, ?WebhookEvent $event = null, ?string $target = null)
    {
        $this->id = $id;
        $this->event = $event;
        $this->target = $target;
    }
}
