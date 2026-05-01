<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->envelopeId->deleteEnvelope(envelopeId: 'envelope_id');

print_r($response);
