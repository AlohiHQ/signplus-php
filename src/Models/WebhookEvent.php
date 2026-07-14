<?php

declare(strict_types=1);

namespace Signplus\Models;

/**
 * Event of the webhook
 */
enum WebhookEvent: string
{
  case EnvelopeExpired = 'ENVELOPE_EXPIRED';
  case EnvelopeDeclined = 'ENVELOPE_DECLINED';
  case EnvelopeVoided = 'ENVELOPE_VOIDED';
  case EnvelopeCompleted = 'ENVELOPE_COMPLETED';
  case EnvelopeAuditTrail = 'ENVELOPE_AUDIT_TRAIL';
}
