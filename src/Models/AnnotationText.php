<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Text annotation (null if annotation is not a text)
 */
class AnnotationText
{
    /**
     * Font size of the text in pt
     */
    #[SerializedName('size')]
    public ?float $size;

    /**
     * Text color in 32bit representation
     */
    #[SerializedName('color')]
    public ?float $color;

    /**
     * Text content of the annotation
     */
    #[SerializedName('value')]
    public ?string $value;

    /**
     * Tooltip of the annotation
     */
    #[SerializedName('tooltip')]
    public ?string $tooltip;

    /**
     * Name of the dynamic field
     */
    #[SerializedName('dynamic_field_name')]
    public ?string $dynamicFieldName;

    #[SerializedName('font')]
    public ?AnnotationFont $font;

    public function __construct(
        ?float $size = null,
        ?float $color = null,
        ?string $value = null,
        ?string $tooltip = null,
        ?string $dynamicFieldName = null,
        ?AnnotationFont $font = null
    ) {
        $this->size = $size;
        $this->color = $color;
        $this->value = $value;
        $this->tooltip = $tooltip;
        $this->dynamicFieldName = $dynamicFieldName;
        $this->font = $font;
    }
}
