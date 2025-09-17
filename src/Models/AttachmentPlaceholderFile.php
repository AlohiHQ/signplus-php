<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AttachmentPlaceholderFile
{
    /**
     * ID of the file
     */
    #[SerializedName('id')]
    public ?string $id;

    /**
     * Name of the file
     */
    #[SerializedName('name')]
    public ?string $name;

    /**
     * Size of the file in bytes
     */
    #[SerializedName('size')]
    public ?int $size;

    /**
     * MIME type of the file
     */
    #[SerializedName('mimetype')]
    public ?string $mimetype;

    public function __construct(?string $id = null, ?string $name = null, ?int $size = null, ?string $mimetype = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->size = $size;
        $this->mimetype = $mimetype;
    }
}
