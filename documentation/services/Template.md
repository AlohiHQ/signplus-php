# Template

A list of all methods in the `Template` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[create_template](#create_template)| Create new template |

## create_template

Create new template


- HTTP Method: `POST`
- Endpoint: `/template`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\CreateTemplateRequest | ✅ | Create new template |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\CreateTemplateRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\CreateTemplateRequest(
  name: "rEATXel"
);

$response = $sdk->template->createTemplate(
  input: $input,
  accept: "application/json"
);

print_r($response);
```


