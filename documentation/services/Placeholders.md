# Placeholders

A list of all methods in the `Placeholders` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_envelope_attachments_placeholders](#set_envelope_attachments_placeholders)| Placeholders to be set, completely replacing the existing ones. |

## set_envelope_attachments_placeholders

Placeholders to be set, completely replacing the existing ones.


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/attachments/placeholders`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeAttachmentsPlaceholdersRequest | ✅ | Placeholders to be set, completely replacing the existing ones. |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetEnvelopeAttachmentsPlaceholdersRequestPlaceholders;
use Signplus\Models\SetEnvelopeAttachmentsPlaceholdersRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$setEnvelopeAttachmentsPlaceholdersRequestPlaceholders = new Models\SetEnvelopeAttachmentsPlaceholdersRequestPlaceholders(
  recipientId: "<string>",
  name: "<string>",
  required: "<boolean>",
  multiple: "<boolean>",
  id: "<string>",
  hint: "<string>"
);

$input = new Models\SetEnvelopeAttachmentsPlaceholdersRequest(
  placeholders: []
);

$response = $sdk->placeholders->setEnvelopeAttachmentsPlaceholders(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


