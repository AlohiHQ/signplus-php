# Signplus

A list of all methods in the `Signplus` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[create_envelope](#create_envelope)| Create new envelope |
|[create_envelope_from_template](#create_envelope_from_template)| Create new envelope from template |
|[list_envelopes](#list_envelopes)| List envelopes |
|[get_envelope](#get_envelope)| Get envelope |
|[delete_envelope](#delete_envelope)| Delete envelope |
|[download_envelope_signed_documents](#download_envelope_signed_documents)| Download signed documents for an envelope |
|[download_envelope_certificate](#download_envelope_certificate)| Download certificate of completion for an envelope |
|[get_envelope_document](#get_envelope_document)| Get envelope document |
|[get_envelope_documents](#get_envelope_documents)| Get envelope documents |
|[add_envelope_document](#add_envelope_document)| Add envelope document |
|[set_envelope_dynamic_fields](#set_envelope_dynamic_fields)| Set envelope dynamic fields |
|[add_envelope_signing_steps](#add_envelope_signing_steps)| Add envelope signing steps |
|[set_envelope_attachments_settings](#set_envelope_attachments_settings)| Set envelope attachment settings |
|[set_envelope_attachments_placeholders](#set_envelope_attachments_placeholders)| Placeholders to be set, completely replacing the existing ones. |
|[get_attachment_file](#get_attachment_file)| Get envelope attachment file |
|[send_envelope](#send_envelope)| Send envelope for signature |
|[duplicate_envelope](#duplicate_envelope)| Duplicate envelope |
|[void_envelope](#void_envelope)| Void envelope |
|[rename_envelope](#rename_envelope)| Rename envelope |
|[set_envelope_comment](#set_envelope_comment)| Set envelope comment |
|[set_envelope_notification](#set_envelope_notification)| Set envelope notification |
|[set_envelope_expiration_date](#set_envelope_expiration_date)| Set envelope expiration date |
|[set_envelope_legality_level](#set_envelope_legality_level)| Set envelope legality level |
|[get_envelope_annotations](#get_envelope_annotations)| Get envelope annotations |
|[get_envelope_document_annotations](#get_envelope_document_annotations)| Get envelope document annotations |
|[add_envelope_annotation](#add_envelope_annotation)| Add envelope annotation |
|[delete_envelope_annotation](#delete_envelope_annotation)| Delete envelope annotation |
|[create_template](#create_template)| Create new template |
|[list_templates](#list_templates)| List templates |
|[get_template](#get_template)| Get template |
|[delete_template](#delete_template)| Delete template |
|[duplicate_template](#duplicate_template)| Duplicate template |
|[add_template_document](#add_template_document)| Add template document |
|[get_template_document](#get_template_document)| Get template document |
|[get_template_documents](#get_template_documents)| Get template documents |
|[add_template_signing_steps](#add_template_signing_steps)| Add template signing steps |
|[rename_template](#rename_template)| Rename template |
|[set_template_comment](#set_template_comment)| Set template comment |
|[set_template_notification](#set_template_notification)| Set template notification |
|[get_template_annotations](#get_template_annotations)| Get template annotations |
|[get_document_template_annotations](#get_document_template_annotations)| Get document template annotations |
|[add_template_annotation](#add_template_annotation)| Add template annotation |
|[delete_template_annotation](#delete_template_annotation)| Delete template annotation |
|[set_template_attachments_settings](#set_template_attachments_settings)| Set template attachment settings |
|[set_template_attachments_placeholders](#set_template_attachments_placeholders)| Placeholders to be set, completely replacing the existing ones. |
|[create_webhook](#create_webhook)| Create webhook |
|[list_webhooks](#list_webhooks)| List webhooks |
|[delete_webhook](#delete_webhook)| Delete webhook |

## create_envelope

Create new envelope


- HTTP Method: `POST`
- Endpoint: `/envelope`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\CreateEnvelopeRequest | ✅ | Create new envelope |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\EnvelopeLegalityLevel;
use Signplus\Models\CreateEnvelopeRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$envelopeLegalityLevel = Models\EnvelopeLegalityLevel::Ses;

$input = new Models\CreateEnvelopeRequest(
  name: "name",
  legalityLevel: $envelopeLegalityLevel,
  expiresAt: 6,
  comment: "comment",
  sandbox: true
);

$response = $sdk->signplus->createEnvelope(
  input: $input
);

print_r($response);
```

## create_envelope_from_template

Create new envelope from template


- HTTP Method: `POST`
- Endpoint: `/envelope/from_template/{template_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\CreateEnvelopeFromTemplateRequest | ✅ | Create new envelope from template |
| $templateId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\CreateEnvelopeFromTemplateRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\CreateEnvelopeFromTemplateRequest(
  name: "name",
  comment: "comment",
  sandbox: true
);

$response = $sdk->signplus->createEnvelopeFromTemplate(
  input: $input,
  templateId: "template_id"
);

print_r($response);
```

## list_envelopes

List envelopes


- HTTP Method: `POST`
- Endpoint: `/envelopes`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\ListEnvelopesRequest | ❌ | List envelopes |

**Return Type**

`Models\ListEnvelopesResponse`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\EnvelopeStatus;
use Signplus\Models\EnvelopeOrderField;
use Signplus\Models\ListEnvelopesRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\ListEnvelopesRequest(
  name: "name",
  tags: [],
  comment: "comment",
  ids: [],
  statuses: [],
  folderIds: [],
  onlyRootFolder: true,
  dateFrom: 123,
  dateTo: 5,
  uid: "uid",
  first: 7,
  last: 3,
  after: "after",
  before: "before",
  orderField: $envelopeOrderField,
  ascending: true,
  includeTrash: true
);

$response = $sdk->signplus->listEnvelopes(
  input: $input
);

print_r($response);
```

## get_envelope

Get envelope


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getEnvelope(
  envelopeId: "envelope_id"
);

print_r($response);
```

## delete_envelope

Delete envelope


- HTTP Method: `DELETE`
- Endpoint: `/envelope/{envelope_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->deleteEnvelope(
  envelopeId: "envelope_id"
);

print_r($response);
```

## download_envelope_signed_documents

Download signed documents for an envelope


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/signed_documents`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ | ID of the envelope |
| $certificateOfCompletion | bool | ❌ | Whether to include the certificate of completion in the downloaded file |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->downloadEnvelopeSignedDocuments(
  certificateOfCompletion: true,
  envelopeId: "envelope_id"
);

print_r($response);
```

## download_envelope_certificate

Download certificate of completion for an envelope


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/certificate`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ | ID of the envelope |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->downloadEnvelopeCertificate(
  envelopeId: "envelope_id"
);

print_r($response);
```

## get_envelope_document

Get envelope document


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/document/{document_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |
| $documentId | string | ✅ |  |

**Return Type**

`Models\Document`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getEnvelopeDocument(
  envelopeId: "envelope_id",
  documentId: "document_id"
);

print_r($response);
```

## get_envelope_documents

Get envelope documents


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/documents`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\ListEnvelopeDocumentsResponse`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getEnvelopeDocuments(
  envelopeId: "envelope_id"
);

print_r($response);
```

## add_envelope_document

Add envelope document


- HTTP Method: `POST`
- Endpoint: `/envelope/{envelope_id}/document`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddEnvelopeDocumentRequest | ✅ | Add envelope document |
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Document`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AddEnvelopeDocumentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\AddEnvelopeDocumentRequest(
  file: file
);

$response = $sdk->signplus->addEnvelopeDocument(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## set_envelope_dynamic_fields

Set envelope dynamic fields


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/dynamic_fields`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeDynamicFieldsRequest | ✅ | Set envelope dynamic fields |
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\DynamicField;
use Signplus\Models\SetEnvelopeDynamicFieldsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$dynamicField = new Models\DynamicField(
  name: "name",
  value: "value"
);

$input = new Models\SetEnvelopeDynamicFieldsRequest(
  dynamicFields: []
);

$response = $sdk->signplus->setEnvelopeDynamicFields(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## add_envelope_signing_steps

Add envelope signing steps


- HTTP Method: `POST`
- Endpoint: `/envelope/{envelope_id}/signing_steps`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddEnvelopeSigningStepsRequest | ✅ | Add envelope signing steps |
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SigningStep;
use Signplus\Models\AddEnvelopeSigningStepsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\AddEnvelopeSigningStepsRequest(
  signingSteps: []
);

$response = $sdk->signplus->addEnvelopeSigningSteps(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## set_envelope_attachments_settings

Set envelope attachment settings


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/attachments/settings`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeAttachmentsSettingsRequest | ✅ | Set envelope attachment settings |
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\EnvelopeAttachments`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AttachmentSettings;
use Signplus\Models\SetEnvelopeAttachmentsSettingsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$attachmentSettings = new Models\AttachmentSettings(
  visibleToRecipients: true
);

$input = new Models\SetEnvelopeAttachmentsSettingsRequest(
  settings: $attachmentSettings
);

$response = $sdk->signplus->setEnvelopeAttachmentsSettings(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## set_envelope_attachments_placeholders

Placeholders to be set, completely replacing the existing ones.


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/attachments/placeholders`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeAttachmentsPlaceholdersRequest | ✅ | Placeholders to be set, completely replacing the existing ones. |
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\EnvelopeAttachments`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AttachmentPlaceholderRequest;
use Signplus\Models\SetEnvelopeAttachmentsPlaceholdersRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$attachmentPlaceholderRequest = new Models\AttachmentPlaceholderRequest(
  recipientId: "recipient_id",
  id: "id",
  name: "name",
  hint: "hint",
  required: true,
  multiple: true
);

$input = new Models\SetEnvelopeAttachmentsPlaceholdersRequest(
  placeholders: []
);

$response = $sdk->signplus->setEnvelopeAttachmentsPlaceholders(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## get_attachment_file

Get envelope attachment file


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/attachments/{file_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |
| $fileId | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getAttachmentFile(
  envelopeId: "envelope_id",
  fileId: "file_id"
);

print_r($response);
```

## send_envelope

Send envelope for signature


- HTTP Method: `POST`
- Endpoint: `/envelope/{envelope_id}/send`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->sendEnvelope(
  envelopeId: "envelope_id"
);

print_r($response);
```

## duplicate_envelope

Duplicate envelope


- HTTP Method: `POST`
- Endpoint: `/envelope/{envelope_id}/duplicate`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->duplicateEnvelope(
  envelopeId: "envelope_id"
);

print_r($response);
```

## void_envelope

Void envelope


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/void`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->voidEnvelope(
  envelopeId: "envelope_id"
);

print_r($response);
```

## rename_envelope

Rename envelope


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/rename`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\RenameEnvelopeRequest | ✅ | Rename envelope |
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\RenameEnvelopeRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\RenameEnvelopeRequest(
  name: "name"
);

$response = $sdk->signplus->renameEnvelope(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## set_envelope_comment

Set envelope comment


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/set_comment`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeCommentRequest | ✅ | Set envelope comment |
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetEnvelopeCommentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\SetEnvelopeCommentRequest(
  comment: "comment"
);

$response = $sdk->signplus->setEnvelopeComment(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## set_envelope_notification

Set envelope notification


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/set_notification`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\EnvelopeNotification | ✅ | Set envelope notification |
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\EnvelopeNotification;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\EnvelopeNotification(
  subject: "subject",
  message: "message",
  reminderInterval: 123
);

$response = $sdk->signplus->setEnvelopeNotification(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## set_envelope_expiration_date

Set envelope expiration date


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/set_expiration_date`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeExpirationRequest | ✅ | Set envelope expiration date |
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetEnvelopeExpirationRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\SetEnvelopeExpirationRequest(
  expiresAt: 1
);

$response = $sdk->signplus->setEnvelopeExpirationDate(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## set_envelope_legality_level

Set envelope legality level


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/set_legality_level`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeLegalityLevelRequest | ✅ | Set envelope legality level |
| $envelopeId | string | ✅ |  |

**Return Type**

`Models\Envelope`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\EnvelopeLegalityLevel;
use Signplus\Models\SetEnvelopeLegalityLevelRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\SetEnvelopeLegalityLevelRequest(
  legalityLevel: $envelopeLegalityLevel
);

$response = $sdk->signplus->setEnvelopeLegalityLevel(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## get_envelope_annotations

Get envelope annotations


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/annotations`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ | ID of the envelope |

**Return Type**

`array`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getEnvelopeAnnotations(
  envelopeId: "envelope_id"
);

print_r($response);
```

## get_envelope_document_annotations

Get envelope document annotations


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/annotations/{document_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ | ID of the envelope |
| $documentId | string | ✅ | ID of document |

**Return Type**

`Models\ListEnvelopeDocumentAnnotationsResponse`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getEnvelopeDocumentAnnotations(
  envelopeId: "envelope_id",
  documentId: "document_id"
);

print_r($response);
```

## add_envelope_annotation

Add envelope annotation


- HTTP Method: `POST`
- Endpoint: `/envelope/{envelope_id}/annotation`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddAnnotationRequest | ✅ | Add envelope annotation |
| $envelopeId | string | ✅ | ID of the envelope |

**Return Type**

`Models\Annotation`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AnnotationType;
use Signplus\Models\AnnotationSignature;
use Signplus\Models\AnnotationInitials;
use Signplus\Models\AnnotationText;
use Signplus\Models\AnnotationDateTime;
use Signplus\Models\AnnotationCheckbox;
use Signplus\Models\AddAnnotationRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$annotationType = Models\AnnotationType::Text;

$input = new Models\AddAnnotationRequest(
  recipientId: "recipient_id",
  documentId: "document_id",
  page: 2,
  x: 6.59,
  y: 2.19,
  width: 4.48,
  height: 7.11,
  required: true,
  type: $annotationType,
  signature: $annotationSignature,
  initials: $annotationInitials,
  text: $annotationText,
  datetime: $annotationDateTime,
  checkbox: $annotationCheckbox
);

$response = $sdk->signplus->addEnvelopeAnnotation(
  input: $input,
  envelopeId: "envelope_id"
);

print_r($response);
```

## delete_envelope_annotation

Delete envelope annotation


- HTTP Method: `DELETE`
- Endpoint: `/envelope/{envelope_id}/annotation/{annotation_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ | ID of the envelope |
| $annotationId | string | ✅ | ID of the annotation to delete |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->deleteEnvelopeAnnotation(
  envelopeId: "envelope_id",
  annotationId: "annotation_id"
);

print_r($response);
```

## create_template

Create new template


- HTTP Method: `POST`
- Endpoint: `/template`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\CreateTemplateRequest | ✅ | Create new template |

**Return Type**

`Models\Template`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\CreateTemplateRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\CreateTemplateRequest(
  name: "name"
);

$response = $sdk->signplus->createTemplate(
  input: $input
);

print_r($response);
```

## list_templates

List templates


- HTTP Method: `POST`
- Endpoint: `/templates`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\ListTemplatesRequest | ❌ | List templates |

**Return Type**

`Models\ListTemplatesResponse`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\TemplateOrderField;
use Signplus\Models\ListTemplatesRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\ListTemplatesRequest(
  name: "name",
  tags: [],
  ids: [],
  first: 8,
  last: 10,
  after: "after",
  before: "before",
  orderField: $templateOrderField,
  ascending: true
);

$response = $sdk->signplus->listTemplates(
  input: $input
);

print_r($response);
```

## get_template

Get template


- HTTP Method: `GET`
- Endpoint: `/template/{template_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ |  |

**Return Type**

`Models\Template`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getTemplate(
  templateId: "template_id"
);

print_r($response);
```

## delete_template

Delete template


- HTTP Method: `DELETE`
- Endpoint: `/template/{template_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->deleteTemplate(
  templateId: "template_id"
);

print_r($response);
```

## duplicate_template

Duplicate template


- HTTP Method: `POST`
- Endpoint: `/template/{template_id}/duplicate`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ |  |

**Return Type**

`Models\Template`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->duplicateTemplate(
  templateId: "template_id"
);

print_r($response);
```

## add_template_document

Add template document


- HTTP Method: `POST`
- Endpoint: `/template/{template_id}/document`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddTemplateDocumentRequest | ✅ | Add template document |
| $templateId | string | ✅ |  |

**Return Type**

`Models\Document`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AddTemplateDocumentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\AddTemplateDocumentRequest(
  file: file
);

$response = $sdk->signplus->addTemplateDocument(
  input: $input,
  templateId: "template_id"
);

print_r($response);
```

## get_template_document

Get template document


- HTTP Method: `GET`
- Endpoint: `/template/{template_id}/document/{document_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ |  |
| $documentId | string | ✅ |  |

**Return Type**

`Models\Document`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getTemplateDocument(
  templateId: "template_id",
  documentId: "document_id"
);

print_r($response);
```

## get_template_documents

Get template documents


- HTTP Method: `GET`
- Endpoint: `/template/{template_id}/documents`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ |  |

**Return Type**

`Models\ListTemplateDocumentsResponse`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getTemplateDocuments(
  templateId: "template_id"
);

print_r($response);
```

## add_template_signing_steps

Add template signing steps


- HTTP Method: `POST`
- Endpoint: `/template/{template_id}/signing_steps`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddTemplateSigningStepsRequest | ✅ | Add template signing steps |
| $templateId | string | ✅ |  |

**Return Type**

`Models\Template`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\TemplateSigningStep;
use Signplus\Models\AddTemplateSigningStepsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$templateSigningStep = new Models\TemplateSigningStep(
  recipients: []
);

$input = new Models\AddTemplateSigningStepsRequest(
  signingSteps: []
);

$response = $sdk->signplus->addTemplateSigningSteps(
  input: $input,
  templateId: "template_id"
);

print_r($response);
```

## rename_template

Rename template


- HTTP Method: `PUT`
- Endpoint: `/template/{template_id}/rename`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\RenameTemplateRequest | ✅ | Rename template |
| $templateId | string | ✅ |  |

**Return Type**

`Models\Template`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\RenameTemplateRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\RenameTemplateRequest(
  name: "name"
);

$response = $sdk->signplus->renameTemplate(
  input: $input,
  templateId: "template_id"
);

print_r($response);
```

## set_template_comment

Set template comment


- HTTP Method: `PUT`
- Endpoint: `/template/{template_id}/set_comment`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetTemplateCommentRequest | ✅ | Set template comment |
| $templateId | string | ✅ |  |

**Return Type**

`Models\Template`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetTemplateCommentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\SetTemplateCommentRequest(
  comment: "comment"
);

$response = $sdk->signplus->setTemplateComment(
  input: $input,
  templateId: "template_id"
);

print_r($response);
```

## set_template_notification

Set template notification


- HTTP Method: `PUT`
- Endpoint: `/template/{template_id}/set_notification`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\EnvelopeNotification | ✅ | Set template notification |
| $templateId | string | ✅ |  |

**Return Type**

`Models\Template`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\EnvelopeNotification;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\EnvelopeNotification(
  subject: "subject",
  message: "message",
  reminderInterval: 123
);

$response = $sdk->signplus->setTemplateNotification(
  input: $input,
  templateId: "template_id"
);

print_r($response);
```

## get_template_annotations

Get template annotations


- HTTP Method: `GET`
- Endpoint: `/template/{template_id}/annotations`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ | ID of the template |

**Return Type**

`Models\ListTemplateAnnotationsResponse`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getTemplateAnnotations(
  templateId: "template_id"
);

print_r($response);
```

## get_document_template_annotations

Get document template annotations


- HTTP Method: `GET`
- Endpoint: `/template/{template_id}/annotations/{document_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ | ID of the template |
| $documentId | string | ✅ | ID of document |

**Return Type**

`Models\ListTemplateDocumentAnnotationsResponse`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->getDocumentTemplateAnnotations(
  templateId: "template_id",
  documentId: "document_id"
);

print_r($response);
```

## add_template_annotation

Add template annotation


- HTTP Method: `POST`
- Endpoint: `/template/{template_id}/annotation`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddAnnotationRequest | ✅ | Add template annotation |
| $templateId | string | ✅ | ID of the template |

**Return Type**

`Models\Annotation`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AnnotationType;
use Signplus\Models\AnnotationSignature;
use Signplus\Models\AnnotationInitials;
use Signplus\Models\AnnotationText;
use Signplus\Models\AnnotationDateTime;
use Signplus\Models\AnnotationCheckbox;
use Signplus\Models\AddAnnotationRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$annotationType = Models\AnnotationType::Text;

$input = new Models\AddAnnotationRequest(
  recipientId: "recipient_id",
  documentId: "document_id",
  page: 2,
  x: 6.59,
  y: 2.19,
  width: 4.48,
  height: 7.11,
  required: true,
  type: $annotationType,
  signature: $annotationSignature,
  initials: $annotationInitials,
  text: $annotationText,
  datetime: $annotationDateTime,
  checkbox: $annotationCheckbox
);

$response = $sdk->signplus->addTemplateAnnotation(
  input: $input,
  templateId: "template_id"
);

print_r($response);
```

## delete_template_annotation

Delete template annotation


- HTTP Method: `DELETE`
- Endpoint: `/template/{template_id}/annotation/{annotation_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $templateId | string | ✅ | ID of the template |
| $annotationId | string | ✅ | ID of the annotation to delete |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->signplus->deleteTemplateAnnotation(
  templateId: "template_id",
  annotationId: "annotation_id"
);

print_r($response);
```

## set_template_attachments_settings

Set template attachment settings


- HTTP Method: `PUT`
- Endpoint: `/template/{template_id}/attachments/settings`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeAttachmentsSettingsRequest | ✅ | Set template attachment settings |
| $templateId | string | ✅ |  |

**Return Type**

`Models\EnvelopeAttachments`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AttachmentSettings;
use Signplus\Models\SetEnvelopeAttachmentsSettingsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$attachmentSettings = new Models\AttachmentSettings(
  visibleToRecipients: true
);

$input = new Models\SetEnvelopeAttachmentsSettingsRequest(
  settings: $attachmentSettings
);

$response = $sdk->signplus->setTemplateAttachmentsSettings(
  input: $input,
  templateId: "template_id"
);

print_r($response);
```

## set_template_attachments_placeholders

Placeholders to be set, completely replacing the existing ones.


- HTTP Method: `PUT`
- Endpoint: `/template/{template_id}/attachments/placeholders`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeAttachmentsPlaceholdersRequest | ✅ | Placeholders to be set, completely replacing the existing ones. |
| $templateId | string | ✅ |  |

**Return Type**

`Models\EnvelopeAttachments`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AttachmentPlaceholderRequest;
use Signplus\Models\SetEnvelopeAttachmentsPlaceholdersRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$attachmentPlaceholderRequest = new Models\AttachmentPlaceholderRequest(
  recipientId: "recipient_id",
  id: "id",
  name: "name",
  hint: "hint",
  required: true,
  multiple: true
);

$input = new Models\SetEnvelopeAttachmentsPlaceholdersRequest(
  placeholders: []
);

$response = $sdk->signplus->setTemplateAttachmentsPlaceholders(
  input: $input,
  templateId: "template_id"
);

print_r($response);
```

## create_webhook

Create webhook


- HTTP Method: `POST`
- Endpoint: `/webhook`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\CreateWebhookRequest | ✅ | Create webhook |

**Return Type**

`Models\Webhook`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\WebhookEvent;
use Signplus\Models\CreateWebhookRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$webhookEvent = Models\WebhookEvent::EnvelopeExpired;

$input = new Models\CreateWebhookRequest(
  event: $webhookEvent,
  target: "target"
);

$response = $sdk->signplus->createWebhook(
  input: $input
);

print_r($response);
```

## list_webhooks

List webhooks


- HTTP Method: `POST`
- Endpoint: `/webhooks`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\ListWebhooksRequest | ❌ | List webhooks |

**Return Type**

`Models\ListWebhooksResponse`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\WebhookEvent;
use Signplus\Models\ListWebhooksRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\ListWebhooksRequest(
  webhookId: "webhook_id",
  event: $webhookEvent
);

$response = $sdk->signplus->listWebhooks(
  input: $input
);

print_r($response);
```

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

$response = $sdk->signplus->deleteWebhook(
  webhookId: "webhook_id"
);

print_r($response);
```


