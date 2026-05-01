# Templates

A list of all methods in the `Templates` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[list_templates](#list_templates)| List templates |

## list_templates

List templates


- HTTP Method: `POST`
- Endpoint: `/templates`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\ListTemplatesRequest | ✅ | List templates |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\ListTemplatesRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\ListTemplatesRequest(
  name: "string",
  tags: [],
  ids: [],
  first: 7297,
  last: 8379,
  after: "string",
  before: "string",
  orderField: "TEMPLATE_NAME",
  ascending: false
);

$response = $sdk->templates->listTemplates(
  input: $input,
  accept: "application/json"
);

print_r($response);
```


