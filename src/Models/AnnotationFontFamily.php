<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Font family of the text
 */
enum AnnotationFontFamily: string
{
    case Unknown = 'UNKNOWN';
    case Serif = 'SERIF';
    case Sans = 'SANS';
    case Mono = 'MONO';
}
