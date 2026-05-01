# Envelope

A list of all methods in the `Envelope` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[create_envelope](#create_envelope)| Create new envelope |

## create_envelope

Create new envelope


- HTTP Method: `POST`
- Endpoint: `/envelope`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\CreateEnvelopeRequest | ✅ | Create new envelope |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\CreateEnvelopeRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\CreateEnvelopeRequest(
  name: "7ox22",
  legalityLevel: "SES",
  expiresAt: 5681,
  comment: "string",
  sandbox: false
);

$response = $sdk->envelope->createEnvelope(
  input: $input,
  accept: "application/json"
);

print_r($response);
```


