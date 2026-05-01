# DocumentId

A list of all methods in the `DocumentId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_envelope_document](#get_envelope_document)| Get envelope document |

## get_envelope_document

Get envelope document


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/document/{document_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |
| $documentId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->documentId->getEnvelopeDocument(
  accept: "application/json",
  envelopeId: "envelope_id",
  documentId: "document_id"
);

print_r($response);
```


