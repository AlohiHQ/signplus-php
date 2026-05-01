# Void_

A list of all methods in the `Void_` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[void_envelope](#void_envelope)| Void envelope |

## void_envelope

Void envelope


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/void`

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

$response = $sdk->void_->voidEnvelope(
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


