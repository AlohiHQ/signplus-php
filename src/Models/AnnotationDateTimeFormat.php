<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Format of the date time (DMY_NUMERIC_SLASH is day/month/year with slashes, MDY_NUMERIC_SLASH is month/day/year with slashes, YMD_NUMERIC_SLASH is year/month/day with slashes, DMY_NUMERIC_DASH_SHORT is day/month/year with dashes, DMY_NUMERIC_DASH is day/month/year with dashes, YMD_NUMERIC_DASH is year/month/day with dashes, MDY_TEXT_DASH_SHORT is month/day/year with dashes, MDY_TEXT_SPACE_SHORT is month/day/year with spaces, MDY_TEXT_SPACE is month/day/year with spaces)
 */
enum AnnotationDateTimeFormat: string
{
    case DmyNumericSlash = 'DMY_NUMERIC_SLASH';
    case MdyNumericSlash = 'MDY_NUMERIC_SLASH';
    case YmdNumericSlash = 'YMD_NUMERIC_SLASH';
    case DmyNumericDashShort = 'DMY_NUMERIC_DASH_SHORT';
    case DmyNumericDash = 'DMY_NUMERIC_DASH';
    case YmdNumericDash = 'YMD_NUMERIC_DASH';
    case MdyTextDashShort = 'MDY_TEXT_DASH_SHORT';
    case MdyTextSpaceShort = 'MDY_TEXT_SPACE_SHORT';
    case MdyTextSpace = 'MDY_TEXT_SPACE';
}
