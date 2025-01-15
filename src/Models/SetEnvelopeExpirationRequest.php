<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeExpirationRequest
{
    /**
     * Unix timestamp of the expiration date
     */
    #[SerializedName('expires_at')]
    public int $expiresAt;

    public function __construct(int $expiresAt)
    {
        $this->expiresAt = $expiresAt;
    }
}
