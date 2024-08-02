<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Type of the annotation
 */
enum AnnotationType: string
{
    case Text = 'TEXT';
    case Signature = 'SIGNATURE';
    case Initials = 'INITIALS';
    case Checkbox = 'CHECKBOX';
    case Date = 'DATE';
}
