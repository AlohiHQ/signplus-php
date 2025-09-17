<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeAttachmentsSettingsRequest
{
    #[SerializedName('settings')]
    public AttachmentSettings $settings;

    public function __construct(AttachmentSettings $settings)
    {
        $this->settings = $settings;
    }
}
