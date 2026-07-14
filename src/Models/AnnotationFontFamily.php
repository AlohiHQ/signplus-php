<?php

declare(strict_types=1);

namespace Signplus\Models;

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
