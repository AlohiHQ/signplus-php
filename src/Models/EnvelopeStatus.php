<?php

declare(strict_types=1);

namespace Signplus\Models;

/**
 * Status of the envelope
 */
enum EnvelopeStatus: string
{
  case Draft = 'DRAFT';
  case InProgress = 'IN_PROGRESS';
  case Completed = 'COMPLETED';
  case Expired = 'EXPIRED';
  case Declined = 'DECLINED';
  case Voided = 'VOIDED';
  case Pending = 'PENDING';
}
