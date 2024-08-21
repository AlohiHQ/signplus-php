<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class RenameTemplateRequest
{
    /**
     * Name of the template
     */
    #[SerializedName('name')]
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
