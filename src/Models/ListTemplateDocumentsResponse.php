<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListTemplateDocumentsResponse
{
    /**
     * @var Document[]|null
     */
    #[SerializedName('documents')]
    public ?array $documents;

    public function __construct(?array $documents = [])
    {
        $this->documents = $documents;
    }
}
