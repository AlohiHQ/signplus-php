# TemplateTemplateIdDocumentDocumentId

A list of all methods in the `TemplateTemplateIdDocumentDocumentId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_template_document](#get_template_document)| Get template document |

## get_template_document

Get template document


- HTTP Method: `GET`
- Endpoint: `/template/{template_id}/document/{document_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ |  |
| $documentId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->templateTemplateIdDocumentDocumentId->getTemplateDocument(
  accept: "application/json",
  templateId: "template_id",
  documentId: "document_id"
);

print_r($response);
```


