# signplus PHP SDK 3.0.0


Welcome to the signplus SDK documentation. This guide will help you get started with integrating and using the signplus SDK in your project.

## Versions

- API version: `2.5.0`
- SDK version: `3.0.0`

## About the API

Integrate legally-binding electronic signature to your workflow

Contact Support:
 Name: Sign.Plus
 Email: support@alohi.com

## Table of Contents
- [Setup & Configuration](#setup--configuration)
	- [Supported Language Versions](#supported-language-versions)
	- [Installation](#installation)
- [Authentication](#authentication)
	- [Access Token Authentication](#access-token-authentication)
- [Setting a Custom Timeout](#setting-a-custom-timeout)
- [Sample Usage](#sample-usage)
- [Services](#services)
- [Models](#models)
- [License](#license)

# Setup & Configuration

## Supported Language Versions

This SDK is compatible with the following versions: `PHP >= 8.1`

## Installation

### Using a local path (recommended for development)

To use the SDK in your project before it is published to Packagist, add a `path` repository entry in your project's `composer.json` pointing to the SDK directory:

```json
{
  "repositories": [
    {
      "type": "path",
      "url": "/path/to/alohi/signplus"
    }
  ]
}
```

Then run:

```bash
composer require alohi/signplus
```

### Using Packagist or a private registry

If the package is published to Packagist or a private Composer registry, install directly:

```bash
composer require alohi/signplus
```

## Verifying the SDK setup

To verify the SDK works correctly, you can run the included example project:

1. Install dependencies:

```bash
composer install
```

2. Run the example:

```bash
php example/index.php
```

## Authentication

### Access Token Authentication
The signplus API uses an Access Token for authentication.

This token must be provided to authenticate your requests to the API.

#### Setting the Access Token

When you initialize the SDK, you can set the access token as follows:

```php
new Client(accessToken: "YOUR_ACCESS_TOKEN");
```

If you need to set or update the access token after initializing the SDK, you can use:

```php
$sdk->setAccessToken("YOUR_ACCESS_TOKEN")
```




## Setting a Custom Timeout

You can set a custom timeout for the SDK's HTTP requests as follows:

```php
$sdk = new Client(timeout: 1000);
```

# Sample Usage

Below is a comprehensive example demonstrating how to authenticate and call a simple endpoint:

```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->envelopeId->deleteEnvelope(
  envelopeId: "envelope_id"
);

print_r($response);

```

## Services

The SDK provides various services to interact with the API.


<details>
<summary>Below is a list of all available services with links to their detailed documentation:</summary>

| Name |
| :--- |
| [TemplateId](documentation/services/TemplateId.md) |
| [SignedDocuments](documentation/services/SignedDocuments.md) |
| [Certificate](documentation/services/Certificate.md) |
| [DocumentId](documentation/services/DocumentId.md) |
| [Document](documentation/services/Document.md) |
| [Documents](documentation/services/Documents.md) |
| [DynamicFields](documentation/services/DynamicFields.md) |
| [SigningSteps](documentation/services/SigningSteps.md) |
| [Settings](documentation/services/Settings.md) |
| [Placeholders](documentation/services/Placeholders.md) |
| [FileId](documentation/services/FileId.md) |
| [Send](documentation/services/Send.md) |
| [Duplicate](documentation/services/Duplicate.md) |
| [Void_](documentation/services/Void_.md) |
| [Rename](documentation/services/Rename.md) |
| [SetComment](documentation/services/SetComment.md) |
| [SetNotification](documentation/services/SetNotification.md) |
| [SetExpirationDate](documentation/services/SetExpirationDate.md) |
| [SetLegalityLevel](documentation/services/SetLegalityLevel.md) |
| [EnvelopeEnvelopeIdAnnotationsDocumentId](documentation/services/EnvelopeEnvelopeIdAnnotationsDocumentId.md) |
| [Annotations](documentation/services/Annotations.md) |
| [AnnotationId](documentation/services/AnnotationId.md) |
| [Annotation](documentation/services/Annotation.md) |
| [EnvelopeId](documentation/services/EnvelopeId.md) |
| [Envelope](documentation/services/Envelope.md) |
| [Envelopes](documentation/services/Envelopes.md) |
| [TemplateTemplateIdDuplicate](documentation/services/TemplateTemplateIdDuplicate.md) |
| [TemplateTemplateIdDocumentDocumentId](documentation/services/TemplateTemplateIdDocumentDocumentId.md) |
| [TemplateTemplateIdDocument](documentation/services/TemplateTemplateIdDocument.md) |
| [TemplateTemplateIdDocuments](documentation/services/TemplateTemplateIdDocuments.md) |
| [TemplateTemplateIdSigningSteps](documentation/services/TemplateTemplateIdSigningSteps.md) |
| [TemplateTemplateIdRename](documentation/services/TemplateTemplateIdRename.md) |
| [TemplateTemplateIdSetComment](documentation/services/TemplateTemplateIdSetComment.md) |
| [TemplateTemplateIdSetNotification](documentation/services/TemplateTemplateIdSetNotification.md) |
| [TemplateTemplateIdAnnotationsDocumentId](documentation/services/TemplateTemplateIdAnnotationsDocumentId.md) |
| [TemplateTemplateIdAnnotations](documentation/services/TemplateTemplateIdAnnotations.md) |
| [TemplateTemplateIdAnnotationAnnotationId](documentation/services/TemplateTemplateIdAnnotationAnnotationId.md) |
| [TemplateTemplateIdAnnotation](documentation/services/TemplateTemplateIdAnnotation.md) |
| [TemplateTemplateIdAttachmentsSettings](documentation/services/TemplateTemplateIdAttachmentsSettings.md) |
| [TemplateTemplateIdAttachmentsPlaceholders](documentation/services/TemplateTemplateIdAttachmentsPlaceholders.md) |
| [TemplateTemplateId](documentation/services/TemplateTemplateId.md) |
| [Template](documentation/services/Template.md) |
| [Templates](documentation/services/Templates.md) |
| [WebhookId](documentation/services/WebhookId.md) |
| [Webhook](documentation/services/Webhook.md) |
| [Webhooks](documentation/services/Webhooks.md) |
</details>


## Models

The SDK includes several models that represent the data structures used in API requests and responses. These models help in organizing and managing the data efficiently.


<details>
<summary>Below is a list of all available models with links to their detailed documentation:</summary>

| Name       | Description |
| :--------- | :---------- |
| [CreateEnvelopeFromTemplateRequest](documentation/models/CreateEnvelopeFromTemplateRequest.md) |  |
| [AddEnvelopeDocumentRequest](documentation/models/AddEnvelopeDocumentRequest.md) |  |
| [SetEnvelopeDynamicFieldsRequest](documentation/models/SetEnvelopeDynamicFieldsRequest.md) |  |
| [AddEnvelopeSigningStepsRequest](documentation/models/AddEnvelopeSigningStepsRequest.md) |  |
| [SetEnvelopeAttachmentsSettingsRequest](documentation/models/SetEnvelopeAttachmentsSettingsRequest.md) |  |
| [SetEnvelopeAttachmentsPlaceholdersRequest](documentation/models/SetEnvelopeAttachmentsPlaceholdersRequest.md) |  |
| [RenameEnvelopeRequest](documentation/models/RenameEnvelopeRequest.md) |  |
| [SetEnvelopeCommentRequest](documentation/models/SetEnvelopeCommentRequest.md) |  |
| [SetEnvelopeNotificationRequest](documentation/models/SetEnvelopeNotificationRequest.md) |  |
| [SetEnvelopeExpirationDateRequest](documentation/models/SetEnvelopeExpirationDateRequest.md) |  |
| [SetEnvelopeLegalityLevelRequest](documentation/models/SetEnvelopeLegalityLevelRequest.md) |  |
| [AddEnvelopeAnnotationRequest](documentation/models/AddEnvelopeAnnotationRequest.md) |  |
| [CreateEnvelopeRequest](documentation/models/CreateEnvelopeRequest.md) |  |
| [ListEnvelopesRequest](documentation/models/ListEnvelopesRequest.md) |  |
| [AddTemplateDocumentRequest](documentation/models/AddTemplateDocumentRequest.md) |  |
| [AddTemplateSigningStepsRequest](documentation/models/AddTemplateSigningStepsRequest.md) |  |
| [RenameTemplateRequest](documentation/models/RenameTemplateRequest.md) |  |
| [SetTemplateCommentRequest](documentation/models/SetTemplateCommentRequest.md) |  |
| [SetTemplateNotificationRequest](documentation/models/SetTemplateNotificationRequest.md) |  |
| [AddTemplateAnnotationRequest](documentation/models/AddTemplateAnnotationRequest.md) |  |
| [SetTemplateAttachmentsSettingsRequest](documentation/models/SetTemplateAttachmentsSettingsRequest.md) |  |
| [SetTemplateAttachmentsPlaceholdersRequest](documentation/models/SetTemplateAttachmentsPlaceholdersRequest.md) |  |
| [CreateTemplateRequest](documentation/models/CreateTemplateRequest.md) |  |
| [ListTemplatesRequest](documentation/models/ListTemplatesRequest.md) |  |
| [CreateWebhookRequest](documentation/models/CreateWebhookRequest.md) |  |
| [ListWebhooksRequest](documentation/models/ListWebhooksRequest.md) |  |
| [DynamicFields](documentation/models/DynamicFields.md) |  |
| [AddEnvelopeSigningStepsRequestSigningSteps](documentation/models/AddEnvelopeSigningStepsRequestSigningSteps.md) |  |
| [SigningStepsRecipients_1](documentation/models/SigningStepsRecipients1.md) |  |
| [Verification](documentation/models/Verification.md) |  |
| [SetEnvelopeAttachmentsSettingsRequestSettings](documentation/models/SetEnvelopeAttachmentsSettingsRequestSettings.md) |  |
| [SetEnvelopeAttachmentsPlaceholdersRequestPlaceholders](documentation/models/SetEnvelopeAttachmentsPlaceholdersRequestPlaceholders.md) |  |
| [AddEnvelopeAnnotationRequestSignature](documentation/models/AddEnvelopeAnnotationRequestSignature.md) |  |
| [AddEnvelopeAnnotationRequestInitials](documentation/models/AddEnvelopeAnnotationRequestInitials.md) |  |
| [AddEnvelopeAnnotationRequestText](documentation/models/AddEnvelopeAnnotationRequestText.md) |  |
| [AddEnvelopeAnnotationRequestDatetime](documentation/models/AddEnvelopeAnnotationRequestDatetime.md) |  |
| [AddEnvelopeAnnotationRequestCheckbox](documentation/models/AddEnvelopeAnnotationRequestCheckbox.md) |  |
| [TextFont_1](documentation/models/TextFont1.md) |  |
| [DatetimeFont_1](documentation/models/DatetimeFont1.md) |  |
| [AddTemplateSigningStepsRequestSigningSteps](documentation/models/AddTemplateSigningStepsRequestSigningSteps.md) |  |
| [SigningStepsRecipients_2](documentation/models/SigningStepsRecipients2.md) |  |
| [AddTemplateAnnotationRequestSignature](documentation/models/AddTemplateAnnotationRequestSignature.md) |  |
| [AddTemplateAnnotationRequestInitials](documentation/models/AddTemplateAnnotationRequestInitials.md) |  |
| [AddTemplateAnnotationRequestText](documentation/models/AddTemplateAnnotationRequestText.md) |  |
| [AddTemplateAnnotationRequestDatetime](documentation/models/AddTemplateAnnotationRequestDatetime.md) |  |
| [AddTemplateAnnotationRequestCheckbox](documentation/models/AddTemplateAnnotationRequestCheckbox.md) |  |
| [TextFont_2](documentation/models/TextFont2.md) |  |
| [DatetimeFont_2](documentation/models/DatetimeFont2.md) |  |
| [SetTemplateAttachmentsSettingsRequestSettings](documentation/models/SetTemplateAttachmentsSettingsRequestSettings.md) |  |
| [SetTemplateAttachmentsPlaceholdersRequestPlaceholders](documentation/models/SetTemplateAttachmentsPlaceholdersRequestPlaceholders.md) |  |
</details>


## License

This SDK is licensed under the MIT License.

See the [LICENSE](LICENSE) file for more details.


