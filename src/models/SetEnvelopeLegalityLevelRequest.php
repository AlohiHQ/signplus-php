<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeLegalityLevelRequest
{
    /**
     * Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes)
     */
    #[SerializedName('legality_level')]
    public ?EnvelopeLegalityLevel $legalityLevel;

    public function __construct(?EnvelopeLegalityLevel $legalityLevel = null)
    {
        $this->legalityLevel = $legalityLevel;
    }
}
