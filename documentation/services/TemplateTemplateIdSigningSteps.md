# TemplateTemplateIdSigningSteps

A list of all methods in the `TemplateTemplateIdSigningSteps` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[add_template_signing_steps](#add_template_signing_steps)| Add template signing steps |

## add_template_signing_steps

Add template signing steps


- HTTP Method: `POST`
- Endpoint: `/template/{template_id}/signing_steps`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddTemplateSigningStepsRequest | ✅ | Add template signing steps |
| $templateId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AddTemplateSigningStepsRequestSigningSteps;
use Signplus\Models\AddTemplateSigningStepsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$signingStepsRecipients2 = new Models\SigningStepsRecipients2(
  id: "string",
  uid: "string",
  name: "string",
  email: "string",
  role: "RECEIVES_COPY"
);

$addTemplateSigningStepsRequestSigningSteps = new Models\AddTemplateSigningStepsRequestSigningSteps(
  recipients: []
);

$input = new Models\AddTemplateSigningStepsRequest(
  signingSteps: []
);

$response = $sdk->templateTemplateIdSigningSteps->addTemplateSigningSteps(
  input: $input,
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


