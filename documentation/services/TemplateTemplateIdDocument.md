# TemplateTemplateIdDocument

A list of all methods in the `TemplateTemplateIdDocument` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[add_template_document](#add_template_document)| Add template document |

## add_template_document

Add template document


- HTTP Method: `POST`
- Endpoint: `/template/{template_id}/document`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddTemplateDocumentRequest | ✅ | Add template document |
| $templateId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AddTemplateDocumentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\AddTemplateDocumentRequest(
  file: ""
);

$response = $sdk->templateTemplateIdDocument->addTemplateDocument(
  input: $input,
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


