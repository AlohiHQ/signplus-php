# TemplateTemplateIdRename

A list of all methods in the `TemplateTemplateIdRename` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[rename_template](#rename_template)| Rename template |

## rename_template

Rename template


- HTTP Method: `PUT`
- Endpoint: `/template/{template_id}/rename`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\RenameTemplateRequest | ✅ | Rename template |
| $templateId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\RenameTemplateRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\RenameTemplateRequest(
  name: "<string>"
);

$response = $sdk->templateTemplateIdRename->renameTemplate(
  input: $input,
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


