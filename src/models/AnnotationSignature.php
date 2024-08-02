<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Signature annotation (null if annotation is not a signature)
 */
class AnnotationSignature
{
    /**
     * Unique identifier of the annotation signature
     */
    #[SerializedName('id')]
    public ?string $id;

    public function __construct(?string $id = null)
    {
        $this->id = $id;
    }
}
