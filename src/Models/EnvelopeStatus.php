<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

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
