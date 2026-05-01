# Duplicate

A list of all methods in the `Duplicate` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[duplicate_envelope](#duplicate_envelope)| Duplicate envelope |

## duplicate_envelope

Duplicate envelope


- HTTP Method: `POST`
- Endpoint: `/envelope/{envelope_id}/duplicate`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->duplicate->duplicateEnvelope(
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


