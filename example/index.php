<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Signplus\Client;
use Signplus\Models\EnvelopeFlowType;
use Signplus\Models\EnvelopeLegalityLevel;
use Signplus\Models\CreateEnvelopeRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$input = new CreateEnvelopeRequest(
    name: 'name',
    flowType: EnvelopeFlowType::RequestSignature,
    legalityLevel: EnvelopeLegalityLevel::Ses,
    expiresAt: 123,
    comment: 'comment',
    sandbox: true
);

$response = $sdk->Signplus->createEnvelope(input: $input);

print_r($response);
