<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateEnvelopeRequest
{
    /**
     * Name of the envelope
     */
    #[SerializedName('name')]
    public string $name;

    /**
     * Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes)
     */
    #[SerializedName('legality_level')]
    public EnvelopeLegalityLevel $legalityLevel;

    /**
     * Unix timestamp of the expiration date
     */
    #[SerializedName('expires_at')]
    public ?int $expiresAt;

    /**
     * Comment for the envelope
     */
    #[SerializedName('comment')]
    public ?string $comment;

    /**
     * Whether the envelope is created in sandbox mode
     */
    #[SerializedName('sandbox')]
    public ?bool $sandbox;

    public function __construct(
        string $name,
        EnvelopeLegalityLevel $legalityLevel,
        ?int $expiresAt = null,
        ?string $comment = null,
        ?bool $sandbox = null
    ) {
        $this->name = $name;
        $this->legalityLevel = $legalityLevel;
        $this->expiresAt = $expiresAt;
        $this->comment = $comment;
        $this->sandbox = $sandbox;
    }
}
