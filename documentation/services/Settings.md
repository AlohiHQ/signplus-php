# Settings

A list of all methods in the `Settings` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_envelope_attachments_settings](#set_envelope_attachments_settings)| Set envelope attachment settings |

## set_envelope_attachments_settings

Set envelope attachment settings


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/attachments/settings`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeAttachmentsSettingsRequest | ✅ | Set envelope attachment settings |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetEnvelopeAttachmentsSettingsRequestSettings;
use Signplus\Models\SetEnvelopeAttachmentsSettingsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$setEnvelopeAttachmentsSettingsRequestSettings = new Models\SetEnvelopeAttachmentsSettingsRequestSettings(
  visibleToRecipients: false
);

$input = new Models\SetEnvelopeAttachmentsSettingsRequest(
  settings: $setEnvelopeAttachmentsSettingsRequestSettings
);

$response = $sdk->settings->setEnvelopeAttachmentsSettings(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


