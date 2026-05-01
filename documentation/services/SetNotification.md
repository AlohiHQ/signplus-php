# SetNotification

A list of all methods in the `SetNotification` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_envelope_notification](#set_envelope_notification)| Set envelope notification |

## set_envelope_notification

Set envelope notification


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/set_notification`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeNotificationRequest | ✅ | Set envelope notification |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetEnvelopeNotificationRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\SetEnvelopeNotificationRequest(
  subject: "<string>",
  message: "<string>",
  reminderInterval: "<integer>"
);

$response = $sdk->setNotification->setEnvelopeNotification(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


