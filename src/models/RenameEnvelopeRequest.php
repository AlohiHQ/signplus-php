<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class RenameEnvelopeRequest
{
    /**
     * Name of the envelope
     */
    #[SerializedName('name')]
    public ?string $name;

    public function __construct(?string $name = null)
    {
        $this->name = $name;
    }
}
