<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AnnotationFont
{
    /**
     * Font family of the text
     */
    #[SerializedName('family')]
    public ?AnnotationFontFamily $family;

    /**
     * Whether the text is italic
     */
    #[SerializedName('italic')]
    public ?bool $italic;

    /**
     * Whether the text is bold
     */
    #[SerializedName('bold')]
    public ?bool $bold;

    public function __construct(?AnnotationFontFamily $family = null, ?bool $italic = null, ?bool $bold = null)
    {
        $this->family = $family;
        $this->italic = $italic;
        $this->bold = $bold;
    }
}
