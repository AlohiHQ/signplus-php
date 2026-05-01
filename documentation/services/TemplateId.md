# TemplateId

A list of all methods in the `TemplateId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[create_envelope_from_template](#create_envelope_from_template)| Create new envelope from template |

## create_envelope_from_template

Create new envelope from template


- HTTP Method: `POST`
- Endpoint: `/envelope/from_template/{template_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\CreateEnvelopeFromTemplateRequest | ✅ | Create new envelope from template |
| $templateId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\CreateEnvelopeFromTemplateRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\CreateEnvelopeFromTemplateRequest(
  name: "fND",
  comment: "<string>",
  sandbox: false
);

$response = $sdk->templateId->createEnvelopeFromTemplate(
  input: $input,
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


