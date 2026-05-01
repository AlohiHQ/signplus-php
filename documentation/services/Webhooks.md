# Webhooks

A list of all methods in the `Webhooks` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[list_webhooks](#list_webhooks)| List webhooks |

## list_webhooks

List webhooks


- HTTP Method: `POST`
- Endpoint: `/webhooks`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\ListWebhooksRequest | ✅ | List webhooks |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\ListWebhooksRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\ListWebhooksRequest(
  webhookId: "<string>",
  event: "ENVELOPE_COMPLETED"
);

$response = $sdk->webhooks->listWebhooks(
  input: $input,
  accept: "application/json"
);

print_r($response);
```


