<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListWebhooksResponse
{
    /**
     * @var Webhook[]|null
     */
    #[SerializedName('webhooks')]
    public ?array $webhooks;

    public function __construct(?array $webhooks = [])
    {
        $this->webhooks = $webhooks;
    }
}
