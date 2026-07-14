<?php

declare(strict_types=1);

namespace Signplus\Models;

/**
 * Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes)
 */
enum EnvelopeLegalityLevel: string
{
  case Ses = 'SES';
  case QesEidas = 'QES_EIDAS';
  case QesZertes = 'QES_ZERTES';
}
