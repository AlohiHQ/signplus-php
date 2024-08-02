<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Field to order envelopes by
 */
enum EnvelopeOrderField: string
{
    case CreationDate = 'CREATION_DATE';
    case ModificationDate = 'MODIFICATION_DATE';
    case Name = 'NAME';
    case Status = 'STATUS';
    case LastDocumentChange = 'LAST_DOCUMENT_CHANGE';
}
