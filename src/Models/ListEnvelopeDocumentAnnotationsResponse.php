<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListEnvelopeDocumentAnnotationsResponse
{
    /**
     * @var Annotation[]|null
     */
    #[SerializedName('annotations')]
    public ?array $annotations;

    public function __construct(?array $annotations = [])
    {
        $this->annotations = $annotations;
    }
}
