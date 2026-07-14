<?php

declare(strict_types=1);

namespace Signplus\Models;

/**
 * Field to order templates by
 */
enum TemplateOrderField: string
{
  case TemplateId = 'TEMPLATE_ID';
  case TemplateCreationDate = 'TEMPLATE_CREATION_DATE';
  case TemplateModificationDate = 'TEMPLATE_MODIFICATION_DATE';
  case TemplateName = 'TEMPLATE_NAME';
}
