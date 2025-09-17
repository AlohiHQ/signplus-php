<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AttachmentPlaceholder
{
    /**
     * ID of the recipient
     */
    #[SerializedName('recipient_id')]
    public ?string $recipientId;

    /**
     * ID of the attachment placeholder
     */
    #[SerializedName('id')]
    public ?string $id;

    /**
     * Name of the attachment placeholder
     */
    #[SerializedName('name')]
    public ?string $name;

    /**
     * Hint of the attachment placeholder
     */
    #[SerializedName('hint')]
    public ?string $hint;

    /**
     * Whether the attachment placeholder is required
     */
    #[SerializedName('required')]
    public ?bool $required;

    /**
     * Whether the attachment placeholder can have multiple files
     */
    #[SerializedName('multiple')]
    public ?bool $multiple;

    /**
     * @var AttachmentPlaceholderFile[]|null
     */
    #[SerializedName('files')]
    public ?array $files;

    public function __construct(
        ?string $recipientId = null,
        ?string $id = null,
        ?string $name = null,
        ?string $hint = null,
        ?bool $required = null,
        ?bool $multiple = null,
        ?array $files = []
    ) {
        $this->recipientId = $recipientId;
        $this->id = $id;
        $this->name = $name;
        $this->hint = $hint;
        $this->required = $required;
        $this->multiple = $multiple;
        $this->files = $files;
    }
}
