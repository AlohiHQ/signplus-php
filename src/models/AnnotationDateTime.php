<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Date annotation (null if annotation is not a date)
 */
class AnnotationDateTime
{
    /**
     * Font size of the text in pt
     */
    #[SerializedName('size')]
    public ?float $size;

    #[SerializedName('font')]
    public ?AnnotationFont $font;

    /**
     * Color of the text in hex format
     */
    #[SerializedName('color')]
    public ?string $color;

    /**
     * Whether the date should be automatically filled
     */
    #[SerializedName('auto_fill')]
    public ?bool $autoFill;

    /**
     * Timezone of the date
     */
    #[SerializedName('timezone')]
    public ?string $timezone;

    /**
     * Unix timestamp of the date
     */
    #[SerializedName('timestamp')]
    public ?int $timestamp;

    /**
     * Format of the date time (DMY_NUMERIC_SLASH is day/month/year with slashes, MDY_NUMERIC_SLASH is month/day/year with slashes, YMD_NUMERIC_SLASH is year/month/day with slashes, DMY_NUMERIC_DASH_SHORT is day/month/year with dashes, DMY_NUMERIC_DASH is day/month/year with dashes, YMD_NUMERIC_DASH is year/month/day with dashes, MDY_TEXT_DASH_SHORT is month/day/year with dashes, MDY_TEXT_SPACE_SHORT is month/day/year with spaces, MDY_TEXT_SPACE is month/day/year with spaces)
     */
    #[SerializedName('format')]
    public ?AnnotationDateTimeFormat $format;

    public function __construct(
        ?float $size = null,
        ?AnnotationFont $font = null,
        ?string $color = null,
        ?bool $autoFill = null,
        ?string $timezone = null,
        ?int $timestamp = null,
        ?AnnotationDateTimeFormat $format = null
    ) {
        $this->size = $size;
        $this->font = $font;
        $this->color = $color;
        $this->autoFill = $autoFill;
        $this->timezone = $timezone;
        $this->timestamp = $timestamp;
        $this->format = $format;
    }
}
