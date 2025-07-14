<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class RecipientVerification
{
    /**
	 * Type of verification the recipient must complete before accessing the envelope.

- `PASSCODE`: requires a code to be entered.  
- `SMS`: sends a code via SMS.  
- `ID_VERIFICATION`: prompts the recipient to complete an automated ID and selfie check.
	 */
    #[SerializedName('type')]
    public ?RecipientVerificationType $type;

    /**
	 * Required for `PASSCODE` and `SMS` verification.

- `PASSCODE`: code required by the recipient to sign the document.
- `SMS`: recipient's phone number.
- `ID_VERIFICATION`: leave empty.
	 */
    #[SerializedName('value')]
    public ?string $value;

    public function __construct(?RecipientVerificationType $type = null, ?string $value = null)
    {
        $this->type = $type;
        $this->value = $value;
    }
}
