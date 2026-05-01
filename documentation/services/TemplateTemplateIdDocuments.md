# TemplateTemplateIdDocuments

A list of all methods in the `TemplateTemplateIdDocuments` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_template_documents](#get_template_documents)| Get template documents |

## get_template_documents

Get template documents


- HTTP Method: `GET`
- Endpoint: `/template/{template_id}/documents`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->templateTemplateIdDocuments->getTemplateDocuments(
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


