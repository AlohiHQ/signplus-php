<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Envelope
{
    /**
     * Unique identifier of the envelope
     */
    #[SerializedName('id')]
    public ?string $id;

    /**
     * Name of the envelope
     */
    #[SerializedName('name')]
    public ?string $name;

    /**
     * Comment for the envelope
     */
    #[SerializedName('comment')]
    public ?string $comment;

    /**
     * Total number of pages in the envelope
     */
    #[SerializedName('pages')]
    public ?int $pages;

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
     * Status of the envelope
     */
    #[SerializedName('status')]
    public ?EnvelopeStatus $status;

    /**
     * Unix timestamp of the creation date
     */
    #[SerializedName('created_at')]
    public ?int $createdAt;

    /**
     * Unix timestamp of the last modification date
     */
    #[SerializedName('updated_at')]
    public ?int $updatedAt;

    /**
     * Unix timestamp of the expiration date
     */
    #[SerializedName('expires_at')]
    public ?int $expiresAt;

    /**
     * Number of recipients in the envelope
     */
    #[SerializedName('num_recipients')]
    public ?int $numRecipients;

    /**
     * Whether the envelope can be duplicated
     */
    #[SerializedName('is_duplicable')]
    public ?bool $isDuplicable;

    /**
     * @var SigningStep[]|null
     */
    #[SerializedName('signing_steps')]
    public ?array $signingSteps;

    /**
     * @var Document[]|null
     */
    #[SerializedName('documents')]
    public ?array $documents;

    #[SerializedName('notification')]
    public ?EnvelopeNotification $notification;

    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $comment = null,
        ?int $pages = null,
        ?EnvelopeFlowType $flowType = null,
        ?EnvelopeLegalityLevel $legalityLevel = null,
        ?EnvelopeStatus $status = null,
        ?int $createdAt = null,
        ?int $updatedAt = null,
        ?int $expiresAt = null,
        ?int $numRecipients = null,
        ?bool $isDuplicable = null,
        ?array $signingSteps = [],
        ?array $documents = [],
        ?EnvelopeNotification $notification = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->comment = $comment;
        $this->pages = $pages;
        $this->flowType = $flowType;
        $this->legalityLevel = $legalityLevel;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->expiresAt = $expiresAt;
        $this->numRecipients = $numRecipients;
        $this->isDuplicable = $isDuplicable;
        $this->signingSteps = $signingSteps;
        $this->documents = $documents;
        $this->notification = $notification;
    }
}
