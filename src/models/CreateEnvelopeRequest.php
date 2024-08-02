<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateEnvelopeRequest
{
    /**
     * Name of the envelope
     */
    #[SerializedName('name')]
    public ?string $name;

    /**
     * Flow type of the envelope (REQUEST_SIGNATURE is a request for signature, SIGN_MYSELF is a self-signing flow)
     */
    #[SerializedName('flow_type')]
    public ?EnvelopeFlowType $flowType;

    /**
     * Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes)
     */
    #[SerializedName('legality_level')]
    public ?EnvelopeLegalityLevel $legalityLevel;

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
        ?string $name = null,
        ?EnvelopeFlowType $flowType = null,
        ?EnvelopeLegalityLevel $legalityLevel = null,
        ?int $expiresAt = null,
        ?string $comment = null,
        ?bool $sandbox = null
    ) {
        $this->name = $name;
        $this->flowType = $flowType;
        $this->legalityLevel = $legalityLevel;
        $this->expiresAt = $expiresAt;
        $this->comment = $comment;
        $this->sandbox = $sandbox;
    }
}
