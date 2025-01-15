<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeDynamicFieldsRequest
{
    /**
     * @var DynamicField[]
     * List of dynamic fields
     */
    #[SerializedName('dynamic_fields')]
    public array $dynamicFields;

    public function __construct(array $dynamicFields)
    {
        $this->dynamicFields = $dynamicFields;
    }
}
