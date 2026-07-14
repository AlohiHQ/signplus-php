<?php

declare(strict_types=1);

namespace Signplus\Models;

/**
 * Role of the recipient (SIGNER signs the document, RECEIVES_COPY receives a copy of the document, IN_PERSON_SIGNER signs the document in person, SENDER sends the document)
 */
enum TemplateRecipientRole: string
{
  case Signer = 'SIGNER';
  case ReceivesCopy = 'RECEIVES_COPY';
  case InPersonSigner = 'IN_PERSON_SIGNER';
  case Sender = 'SENDER';
}
