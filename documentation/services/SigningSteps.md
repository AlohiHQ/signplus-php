# SigningSteps

A list of all methods in the `SigningSteps` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[add_envelope_signing_steps](#add_envelope_signing_steps)| Add envelope signing steps |

## add_envelope_signing_steps

Add envelope signing steps


- HTTP Method: `POST`
- Endpoint: `/envelope/{envelope_id}/signing_steps`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddEnvelopeSigningStepsRequest | ✅ | Add envelope signing steps |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AddEnvelopeSigningStepsRequestSigningSteps;
use Signplus\Models\AddEnvelopeSigningStepsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$verification = new Models\Verification(
  type: "SMS",
  value: "<string>"
);

$signingStepsRecipients1 = new Models\SigningStepsRecipients1(
  name: "<string>",
  email: "<string>",
  role: "IN_PERSON_SIGNER",
  id: "<string>",
  uid: "<string>",
  verification: $verification
);

$addEnvelopeSigningStepsRequestSigningSteps = new Models\AddEnvelopeSigningStepsRequestSigningSteps(
  recipients: []
);

$input = new Models\AddEnvelopeSigningStepsRequest(
  signingSteps: []
);

$response = $sdk->signingSteps->addEnvelopeSigningSteps(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


