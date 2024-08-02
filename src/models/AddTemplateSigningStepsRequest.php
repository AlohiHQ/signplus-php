<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddTemplateSigningStepsRequest
{
    /**
     * @var TemplateSigningStep[]|null
     * List of signing steps
     */
    #[SerializedName('signing_steps')]
    public ?array $signingSteps;

    public function __construct(?array $signingSteps = [])
    {
        $this->signingSteps = $signingSteps;
    }
}
