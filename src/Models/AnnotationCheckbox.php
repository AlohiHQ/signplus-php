<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Checkbox annotation (null if annotation is not a checkbox)
 */
class AnnotationCheckbox
{
    /**
     * Whether the checkbox is checked
     */
    #[SerializedName('checked')]
    public ?bool $checked;

    /**
     * Style of the checkbox
     */
    #[SerializedName('style')]
    public ?AnnotationCheckboxStyle $style;

    public function __construct(?bool $checked = null, ?AnnotationCheckboxStyle $style = null)
    {
        $this->checked = $checked;
        $this->style = $style;
    }
}
