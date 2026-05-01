# Certificate

A list of all methods in the `Certificate` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[download_envelope_certificate](#download_envelope_certificate)| Download certificate of completion for an envelope |

## download_envelope_certificate

Download certificate of completion for an envelope


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/certificate`

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

$response = $sdk->certificate->downloadEnvelopeCertificate(
  accept: "application/pdf",
  envelopeId: "envelope_id"
);

print_r($response);
```


