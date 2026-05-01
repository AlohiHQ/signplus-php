# TemplateTemplateIdAnnotations

A list of all methods in the `TemplateTemplateIdAnnotations` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_template_annotations](#get_template_annotations)| Get template annotations |

## get_template_annotations

Get template annotations


- HTTP Method: `GET`
- Endpoint: `/template/{template_id}/annotations`

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

$response = $sdk->templateTemplateIdAnnotations->getTemplateAnnotations(
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


