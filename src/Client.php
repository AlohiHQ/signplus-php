<?php

declare(strict_types=1);

namespace Signplus;

use Signplus\Services;

class Client
{
    public $Signplus;

    public function __construct(
        string $accessToken,
        string $tokenPrefix = 'Bearer ',
        string $environment = Environment::Default
    ) {
        $this->Signplus = new Services\Signplus($accessToken, $tokenPrefix, $environment);
    }

    public function setBaseUrl(string $url)
    {
        $this->Signplus->setBaseUrl($url);
    }

    public function setAccessToken(string $accessToken)
    {
        $this->Signplus->setAccessToken($accessToken);
    }
}

// c029837e0e474b76bc487506e8799df5e3335891efe4fb02bda7a1441840310c
