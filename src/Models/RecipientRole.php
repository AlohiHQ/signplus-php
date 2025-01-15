<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Role of the recipient (SIGNER signs the document, RECEIVES_COPY receives a copy of the document, IN_PERSON_SIGNER signs the document in person, SENDER sends the document)
 */
enum RecipientRole: string
{
    case Signer = 'SIGNER';
    case ReceivesCopy = 'RECEIVES_COPY';
    case InPersonSigner = 'IN_PERSON_SIGNER';
}
