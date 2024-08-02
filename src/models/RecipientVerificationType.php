<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Type of signature verification (SMS sends a code via SMS, PASSCODE requires a code to be entered)
 */
enum RecipientVerificationType: string
{
    case Sms = 'SMS';
    case Passcode = 'PASSCODE';
}
