# TemplateTemplateIdAnnotationsDocumentId

A list of all methods in the `TemplateTemplateIdAnnotationsDocumentId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_document_template_annotations](#get_document_template_annotations)| Get document template annotations |

## get_document_template_annotations

Get document template annotations


- HTTP Method: `GET`
- Endpoint: `/template/{template_id}/annotations/{document_id}`

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

$response = $sdk->templateTemplateIdAnnotationsDocumentId->getDocumentTemplateAnnotations(
  accept: "application/json",
  templateId: "template_id",
  documentId: "document_id"
);

print_r($response);
```


