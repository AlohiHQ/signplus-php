# TemplateTemplateIdAttachmentsSettings

A list of all methods in the `TemplateTemplateIdAttachmentsSettings` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_template_attachments_settings](#set_template_attachments_settings)| Set template attachment settings |

## set_template_attachments_settings

Set template attachment settings


- HTTP Method: `PUT`
- Endpoint: `/template/{template_id}/attachments/settings`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetTemplateAttachmentsSettingsRequest | ✅ | Set template attachment settings |
| $templateId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetTemplateAttachmentsSettingsRequestSettings;
use Signplus\Models\SetTemplateAttachmentsSettingsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$setTemplateAttachmentsSettingsRequestSettings = new Models\SetTemplateAttachmentsSettingsRequestSettings(
  visibleToRecipients: "<boolean>"
);

$input = new Models\SetTemplateAttachmentsSettingsRequest(
  settings: $setTemplateAttachmentsSettingsRequestSettings
);

$response = $sdk->templateTemplateIdAttachmentsSettings->setTemplateAttachmentsSettings(
  input: $input,
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


