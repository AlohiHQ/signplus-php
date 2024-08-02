<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Event of the webhook
 */
enum WebhookEvent: string
{
    case EnvelopeExpired = 'ENVELOPE_EXPIRED';
    case EnvelopeDeclined = 'ENVELOPE_DECLINED';
    case EnvelopeVoided = 'ENVELOPE_VOIDED';
    case EnvelopeCompleted = 'ENVELOPE_COMPLETED';
}
