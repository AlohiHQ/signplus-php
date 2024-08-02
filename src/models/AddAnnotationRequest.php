<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddAnnotationRequest
{
    /**
     * ID of the recipient
     */
    #[SerializedName('recipient_id')]
    public ?string $recipientId;

    /**
     * ID of the document
     */
    #[SerializedName('document_id')]
    public string $documentId;

    /**
     * Page number where the annotation is placed
     */
    #[SerializedName('page')]
    public int $page;

    /**
     * X coordinate of the annotation (in % of the page width from 0 to 100) from the top left corner
     */
    #[SerializedName('x')]
    public float $x;

    /**
     * Y coordinate of the annotation (in % of the page height from 0 to 100) from the top left corner
     */
    #[SerializedName('y')]
    public float $y;

    /**
     * Width of the annotation (in % of the page width from 0 to 100)
     */
    #[SerializedName('width')]
    public float $width;

    /**
     * Height of the annotation (in % of the page height from 0 to 100)
     */
    #[SerializedName('height')]
    public float $height;

    #[SerializedName('required')]
    public ?bool $required;

    /**
     * Type of the annotation
     */
    #[SerializedName('type')]
    public AnnotationType $type;

    /**
     * Signature annotation (null if annotation is not a signature)
     */
    #[SerializedName('signature')]
    public ?AnnotationSignature $signature;

    /**
     * Initials annotation (null if annotation is not initials)
     */
    #[SerializedName('initials')]
    public ?AnnotationInitials $initials;

    /**
     * Text annotation (null if annotation is not a text)
     */
    #[SerializedName('text')]
    public ?AnnotationText $text;

    /**
     * Date annotation (null if annotation is not a date)
     */
    #[SerializedName('datetime')]
    public ?AnnotationDateTime $datetime;

    /**
     * Checkbox annotation (null if annotation is not a checkbox)
     */
    #[SerializedName('checkbox')]
    public ?AnnotationCheckbox $checkbox;

    public function __construct(
        ?string $recipientId = null,
        string $documentId,
        int $page,
        float $x,
        float $y,
        float $width,
        float $height,
        ?bool $required = null,
        AnnotationType $type,
        ?AnnotationSignature $signature = null,
        ?AnnotationInitials $initials = null,
        ?AnnotationText $text = null,
        ?AnnotationDateTime $datetime = null,
        ?AnnotationCheckbox $checkbox = null
    ) {
        $this->recipientId = $recipientId;
        $this->documentId = $documentId;
        $this->page = $page;
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
        $this->required = $required;
        $this->type = $type;
        $this->signature = $signature;
        $this->initials = $initials;
        $this->text = $text;
        $this->datetime = $datetime;
        $this->checkbox = $checkbox;
    }
}
