# SignedDocuments

A list of all methods in the `SignedDocuments` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[download_envelope_signed_documents](#download_envelope_signed_documents)| Download signed documents for an envelope |

## download_envelope_signed_documents

Download signed documents for an envelope


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/signed_documents`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |
| $certificateOfCompletion | string | ❌ | Whether to include the certificate of completion in the downloaded file |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signedDocuments->downloadEnvelopeSignedDocuments(
  certificateOfCompletion: "true",
  accept: "application/pdf",
  envelopeId: "envelope_id"
);

print_r($response);
```


