<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SigningStep
{
    /**
     * @var Recipient[]|null
     * List of recipients
     */
    #[SerializedName('recipients')]
    public ?array $recipients;

    public function __construct(?array $recipients = [])
    {
        $this->recipients = $recipients;
    }
}
