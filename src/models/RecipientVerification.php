<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class RecipientVerification
{
    /**
     * Type of signature verification (SMS sends a code via SMS, PASSCODE requires a code to be entered)
     */
    #[SerializedName('type')]
    public ?RecipientVerificationType $type;

    #[SerializedName('value')]
    public ?string $value;

    public function __construct(?RecipientVerificationType $type = null, ?string $value = null)
    {
        $this->type = $type;
        $this->value = $value;
    }
}
