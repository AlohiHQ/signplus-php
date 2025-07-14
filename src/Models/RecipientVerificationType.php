<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Type of verification the recipient must complete before accessing the envelope.

- `PASSCODE`: requires a code to be entered.  
- `SMS`: sends a code via SMS.  
- `ID_VERIFICATION`: prompts the recipient to complete an automated ID and selfie check.
 */
enum RecipientVerificationType: string
{
    case Sms = 'SMS';
    case Passcode = 'PASSCODE';
    case IdVerification = 'ID_VERIFICATION';
}
