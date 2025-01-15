<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateEnvelopeFromTemplateRequest
{
    /**
     * Name of the envelope
     */
    #[SerializedName('name')]
    public string $name;

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

    public function __construct(string $name, ?string $comment = null, ?bool $sandbox = null)
    {
        $this->name = $name;
        $this->comment = $comment;
        $this->sandbox = $sandbox;
    }
}
