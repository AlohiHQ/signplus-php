# WebhookId

A list of all methods in the `WebhookId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[delete_webhook](#delete_webhook)| Delete webhook |

## delete_webhook

Delete webhook


- HTTP Method: `DELETE`
- Endpoint: `/webhook/{webhook_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $webhookId | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->webhookId->deleteWebhook(
  webhookId: "webhook_id"
);

print_r($response);
```


