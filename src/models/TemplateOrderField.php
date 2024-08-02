<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

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
