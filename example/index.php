<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Signplus\Models;

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getEnvelope(envelopeId: 'envelope_id');

print_r($response);
