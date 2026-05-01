# Document

A list of all methods in the `Document` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[add_envelope_document](#add_envelope_document)| Add envelope document |

## add_envelope_document

Add envelope document


- HTTP Method: `POST`
- Endpoint: `/envelope/{envelope_id}/document`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddEnvelopeDocumentRequest | ✅ | Add envelope document |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AddEnvelopeDocumentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\AddEnvelopeDocumentRequest(
  file: ""
);

$response = $sdk->document->addEnvelopeDocument(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


