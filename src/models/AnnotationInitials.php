<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Initials annotation (null if annotation is not initials)
 */
class AnnotationInitials
{
    /**
     * Unique identifier of the annotation initials
     */
    #[SerializedName('id')]
    public ?string $id;

    public function __construct(?string $id = null)
    {
        $this->id = $id;
    }
}
