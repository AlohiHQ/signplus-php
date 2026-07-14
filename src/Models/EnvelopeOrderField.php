<?php

declare(strict_types=1);

namespace Signplus\Models;

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
