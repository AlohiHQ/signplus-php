<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AttachmentPlaceholdersPerRecipient
{
    /**
     * ID of the recipient
     */
    #[SerializedName('recipient_id')]
    public ?string $recipientId;

    /**
     * Name of the recipient
     */
    #[SerializedName('recipient_name')]
    public ?string $recipientName;

    /**
     * @var AttachmentPlaceholder[]|null
     */
    #[SerializedName('placeholders')]
    public ?array $placeholders;

    public function __construct(?string $recipientId = null, ?string $recipientName = null, ?array $placeholders = [])
    {
        $this->recipientId = $recipientId;
        $this->recipientName = $recipientName;
        $this->placeholders = $placeholders;
    }
}
