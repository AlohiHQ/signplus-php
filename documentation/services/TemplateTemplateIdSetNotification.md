# TemplateTemplateIdSetNotification

A list of all methods in the `TemplateTemplateIdSetNotification` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_template_notification](#set_template_notification)| Set template notification |

## set_template_notification

Set template notification


- HTTP Method: `PUT`
- Endpoint: `/template/{template_id}/set_notification`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetTemplateNotificationRequest | ✅ | Set template notification |
| $templateId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetTemplateNotificationRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\SetTemplateNotificationRequest(
  subject: "<string>",
  message: "<string>",
  reminderInterval: "<integer>"
);

$response = $sdk->templateTemplateIdSetNotification->setTemplateNotification(
  input: $input,
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


