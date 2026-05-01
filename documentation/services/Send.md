# Send

A list of all methods in the `Send` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[send_envelope](#send_envelope)| Send envelope for signature |

## send_envelope

Send envelope for signature


- HTTP Method: `POST`
- Endpoint: `/envelope/{envelope_id}/send`

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

$response = $sdk->send->sendEnvelope(
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


