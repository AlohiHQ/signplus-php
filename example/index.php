<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Signplus\Models;

use Signplus\Client;
use Signplus\Models\EnvelopeLegalityLevel;
use Signplus\Models\CreateEnvelopeRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$envelopeLegalityLevel = Models\EnvelopeLegalityLevel::Ses;

$input = new Models\CreateEnvelopeRequest(
    name: 'name',
    legalityLevel: $envelopeLegalityLevel,
    expiresAt: 8,
    comment: 'comment',
    sandbox: true
);

$response = $sdk->signplus->createEnvelope(input: $input);

print_r($response);
