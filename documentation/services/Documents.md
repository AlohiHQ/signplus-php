# Documents

A list of all methods in the `Documents` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_envelope_documents](#get_envelope_documents)| Get envelope documents |

## get_envelope_documents

Get envelope documents


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/documents`

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

$response = $sdk->documents->getEnvelopeDocuments(
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


