<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AttachmentSettings
{
    /**
     * Whether the attachment is visible to the recipients
     */
    #[SerializedName('visible_to_recipients')]
    public ?bool $visibleToRecipients;

    public function __construct(?bool $visibleToRecipients = null)
    {
        $this->visibleToRecipients = $visibleToRecipients;
    }
}
