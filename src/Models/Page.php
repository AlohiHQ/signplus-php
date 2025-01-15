<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Page
{
    /**
     * Width of the page in pixels
     */
    #[SerializedName('width')]
    public ?int $width;

    /**
     * Height of the page in pixels
     */
    #[SerializedName('height')]
    public ?int $height;

    public function __construct(?int $width = null, ?int $height = null)
    {
        $this->width = $width;
        $this->height = $height;
    }
}
