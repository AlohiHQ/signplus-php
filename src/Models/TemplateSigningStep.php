<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class TemplateSigningStep
{
    /**
     * @var TemplateRecipient[]|null
     * List of recipients
     */
    #[SerializedName('recipients')]
    public ?array $recipients;

    public function __construct(?array $recipients = [])
    {
        $this->recipients = $recipients;
    }
}
