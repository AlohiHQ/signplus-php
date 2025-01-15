<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CreateTemplateRequest
{
    #[SerializedName('name')]
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
