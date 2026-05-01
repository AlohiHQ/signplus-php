# TemplateTemplateIdAttachmentsPlaceholders

A list of all methods in the `TemplateTemplateIdAttachmentsPlaceholders` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_template_attachments_placeholders](#set_template_attachments_placeholders)| Placeholders to be set, completely replacing the existing ones. |

## set_template_attachments_placeholders

Placeholders to be set, completely replacing the existing ones.


- HTTP Method: `PUT`
- Endpoint: `/template/{template_id}/attachments/placeholders`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetTemplateAttachmentsPlaceholdersRequest | ✅ | Placeholders to be set, completely replacing the existing ones. |
| $templateId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetTemplateAttachmentsPlaceholdersRequestPlaceholders;
use Signplus\Models\SetTemplateAttachmentsPlaceholdersRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$setTemplateAttachmentsPlaceholdersRequestPlaceholders = new Models\SetTemplateAttachmentsPlaceholdersRequestPlaceholders(
  recipientId: "<string>",
  name: "<string>",
  required: "<boolean>",
  multiple: "<boolean>",
  id: "<string>",
  hint: "<string>"
);

$input = new Models\SetTemplateAttachmentsPlaceholdersRequest(
  placeholders: []
);

$response = $sdk->templateTemplateIdAttachmentsPlaceholders->setTemplateAttachmentsPlaceholders(
  input: $input,
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


