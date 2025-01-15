<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class DynamicField
{
    /**
     * Name of the dynamic field
     */
    #[SerializedName('name')]
    public ?string $name;

    /**
     * Value of the dynamic field
     */
    #[SerializedName('value')]
    public ?string $value;

    public function __construct(?string $name = null, ?string $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }
}
