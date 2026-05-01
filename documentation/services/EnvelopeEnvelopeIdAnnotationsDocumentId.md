# EnvelopeEnvelopeIdAnnotationsDocumentId

A list of all methods in the `EnvelopeEnvelopeIdAnnotationsDocumentId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_envelope_document_annotations](#get_envelope_document_annotations)| Get envelope document annotations |

## get_envelope_document_annotations

Get envelope document annotations


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/annotations/{document_id}`

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

$response = $sdk->envelopeEnvelopeIdAnnotationsDocumentId->getEnvelopeDocumentAnnotations(
  accept: "application/json",
  envelopeId: "envelope_id",
  documentId: "document_id"
);

print_r($response);
```


