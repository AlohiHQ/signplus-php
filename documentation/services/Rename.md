# Rename

A list of all methods in the `Rename` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[rename_envelope](#rename_envelope)| Rename envelope |

## rename_envelope

Rename envelope


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/rename`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\RenameEnvelopeRequest | ✅ | Rename envelope |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\RenameEnvelopeRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\RenameEnvelopeRequest(
  name: "string"
);

$response = $sdk->rename->renameEnvelope(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


