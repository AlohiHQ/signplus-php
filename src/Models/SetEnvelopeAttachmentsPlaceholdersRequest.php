<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeAttachmentsPlaceholdersRequest
{
    /**
     * @var AttachmentPlaceholderRequest[]
     */
    #[SerializedName('placeholders')]
    public array $placeholders;

    public function __construct(array $placeholders)
    {
        $this->placeholders = $placeholders;
    }
}
