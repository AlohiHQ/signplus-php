# Webhook

A list of all methods in the `Webhook` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[create_webhook](#create_webhook)| Create webhook |

## create_webhook

Create webhook


- HTTP Method: `POST`
- Endpoint: `/webhook`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\CreateWebhookRequest | ✅ | Create webhook |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\CreateWebhookRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\CreateWebhookRequest(
  event: "ENVELOPE_AUDIT_TRAIL",
  target: "string"
);

$response = $sdk->webhook->createWebhook(
  input: $input,
  accept: "application/json"
);

print_r($response);
```


