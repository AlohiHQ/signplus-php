<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Style of the checkbox
 */
enum AnnotationCheckboxStyle: string
{
    case CircleCheck = 'CIRCLE_CHECK';
    case CircleFull = 'CIRCLE_FULL';
    case SquareCheck = 'SQUARE_CHECK';
    case SquareFull = 'SQUARE_FULL';
    case CheckMark = 'CHECK_MARK';
    case TimesSquare = 'TIMES_SQUARE';
}
