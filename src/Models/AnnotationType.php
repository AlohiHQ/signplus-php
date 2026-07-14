<?php

declare(strict_types=1);

namespace Signplus\Models;

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
