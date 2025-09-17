<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AttachmentPlaceholderRequest
{
    /**
     * ID of the recipient
     */
    #[SerializedName('recipient_id')]
    public string $recipientId;

    /**
     * ID of the attachment placeholder
     */
    #[SerializedName('id')]
    public ?string $id;

    #[SerializedName('name')]
    public string $name;

    /**
     * Hint of the attachment placeholder
     */
    #[SerializedName('hint')]
    public ?string $hint;

    /**
     * Whether the attachment placeholder is required
     */
    #[SerializedName('required')]
    public bool $required;

    #[SerializedName('multiple')]
    public bool $multiple;

    public function __construct(
        string $recipientId,
        ?string $id = null,
        string $name,
        ?string $hint = null,
        bool $required,
        bool $multiple
    ) {
        $this->recipientId = $recipientId;
        $this->id = $id;
        $this->name = $name;
        $this->hint = $hint;
        $this->required = $required;
        $this->multiple = $multiple;
    }
}
