# TemplateTemplateIdDuplicate

A list of all methods in the `TemplateTemplateIdDuplicate` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[duplicate_template](#duplicate_template)| Duplicate template |

## duplicate_template

Duplicate template


- HTTP Method: `POST`
- Endpoint: `/template/{template_id}/duplicate`

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

$response = $sdk->templateTemplateIdDuplicate->duplicateTemplate(
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


