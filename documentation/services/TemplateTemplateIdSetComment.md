# TemplateTemplateIdSetComment

A list of all methods in the `TemplateTemplateIdSetComment` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_template_comment](#set_template_comment)| Set template comment |

## set_template_comment

Set template comment


- HTTP Method: `PUT`
- Endpoint: `/template/{template_id}/set_comment`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetTemplateCommentRequest | ✅ | Set template comment |
| $templateId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetTemplateCommentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\SetTemplateCommentRequest(
  comment: "string"
);

$response = $sdk->templateTemplateIdSetComment->setTemplateComment(
  input: $input,
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


