<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Template
{
    /**
     * Unique identifier of the template
     */
    #[SerializedName('id')]
    public ?string $id;

    /**
     * Name of the template
     */
    #[SerializedName('name')]
    public ?string $name;

    /**
     * Comment for the template
     */
    #[SerializedName('comment')]
    public ?string $comment;

    /**
     * Total number of pages in the template
     */
    #[SerializedName('pages')]
    public ?int $pages;

    /**
     * Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes)
     */
    #[SerializedName('legality_level')]
    public ?EnvelopeLegalityLevel $legalityLevel;

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
     * Expiration delay added to the current time when an envelope is created from this template
     */
    #[SerializedName('expiration_delay')]
    public ?int $expirationDelay;

    /**
     * Number of recipients in the envelope
     */
    #[SerializedName('num_recipients')]
    public ?int $numRecipients;

    /**
     * @var TemplateSigningStep[]|null
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

    /**
     * @var string[]|null
     * List of dynamic fields
     */
    #[SerializedName('dynamic_fields')]
    public ?array $dynamicFields;

    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $comment = null,
        ?int $pages = null,
        ?EnvelopeLegalityLevel $legalityLevel = null,
        ?int $createdAt = null,
        ?int $updatedAt = null,
        ?int $expirationDelay = null,
        ?int $numRecipients = null,
        ?array $signingSteps = [],
        ?array $documents = [],
        ?EnvelopeNotification $notification = null,
        ?array $dynamicFields = []
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->comment = $comment;
        $this->pages = $pages;
        $this->legalityLevel = $legalityLevel;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->expirationDelay = $expirationDelay;
        $this->numRecipients = $numRecipients;
        $this->signingSteps = $signingSteps;
        $this->documents = $documents;
        $this->notification = $notification;
        $this->dynamicFields = $dynamicFields;
    }
}
