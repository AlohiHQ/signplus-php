<?php

declare(strict_types=1);

namespace Signplus\Models;

/**
 * Flow type of the envelope (REQUEST_SIGNATURE is a request for signature, SIGN_MYSELF is a self-signing flow)
 */
enum EnvelopeFlowType: string
{
  case RequestSignature = 'REQUEST_SIGNATURE';
  case SignMyself = 'SIGN_MYSELF';
}
