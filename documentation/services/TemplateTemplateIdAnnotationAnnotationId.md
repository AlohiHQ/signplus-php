# TemplateTemplateIdAnnotationAnnotationId

A list of all methods in the `TemplateTemplateIdAnnotationAnnotationId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[delete_template_annotation](#delete_template_annotation)| Delete template annotation |

## delete_template_annotation

Delete template annotation


- HTTP Method: `DELETE`
- Endpoint: `/template/{template_id}/annotation/{annotation_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ |  |
| $annotationId | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->templateTemplateIdAnnotationAnnotationId->deleteTemplateAnnotation(
  templateId: "template_id",
  annotationId: "annotation_id"
);

print_r($response);
```


