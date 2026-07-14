<?php

declare(strict_types=1);

namespace Signplus\Models;

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
