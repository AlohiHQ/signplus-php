<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class EnvelopeAttachments
{
    #[SerializedName('settings')]
    public ?AttachmentSettings $settings;

    /**
     * @var AttachmentPlaceholdersPerRecipient[]|null
     */
    #[SerializedName('recipients')]
    public ?array $recipients;

    public function __construct(?AttachmentSettings $settings = null, ?array $recipients = [])
    {
        $this->settings = $settings;
        $this->recipients = $recipients;
    }
}
