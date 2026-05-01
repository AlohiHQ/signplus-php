# TemplateTemplateId

A list of all methods in the `TemplateTemplateId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_template](#get_template)| Get template |
|[delete_template](#delete_template)| Delete template |

## get_template

Get template


- HTTP Method: `GET`
- Endpoint: `/template/{template_id}`

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

$response = $sdk->templateTemplateId->getTemplate(
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```

## delete_template

Delete template


- HTTP Method: `DELETE`
- Endpoint: `/template/{template_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->templateTemplateId->deleteTemplate(
  templateId: "template_id"
);

print_r($response);
```


