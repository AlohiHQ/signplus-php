# signplus PHP SDK
Version: 2.0.0
Integrate legally-binding electronic signature to your workflow

## Install

```bash
composer install alohi/signplus
```

## Example

```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getEnvelope(
  envelopeId: "envelopeId"
);

print_r($response);

```

## Services
### Signplus
#### createEnvelope

```PHP
<?php

use Signplus\Client;
use Signplus\Models\EnvelopeLegalityLevel;
use Signplus\Models\CreateEnvelopeRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$envelopeLegalityLevel = EnvelopeLegalityLevel::Ses;

$input = new CreateEnvelopeRequest(
  name: "name",
  legalityLevel: $envelopeLegalityLevel,
  expiresAt: 123,
  comment: "comment",
  sandbox: true
);

$response = $sdk->Signplus->createEnvelope(
  input: $input
);

print_r($response);
```
#### createEnvelopeFromTemplate

```PHP
<?php

use Signplus\Client;
use Signplus\Models\CreateEnvelopeFromTemplateRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new CreateEnvelopeFromTemplateRequest(
  name: "name",
  comment: "comment",
  sandbox: true
);

$response = $sdk->Signplus->createEnvelopeFromTemplate(
  input: $input,
  templateId: "templateId"
);

print_r($response);
```
#### listEnvelopes

```PHP
<?php

use Signplus\Client;
use Signplus\Models\EnvelopeStatus;
use Signplus\Models\EnvelopeOrderField;
use Signplus\Models\ListEnvelopesRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new ListEnvelopesRequest(
  name: "name",
  tags: [],
  comment: "comment",
  ids: [],
  statuses: [],
  folderIds: [],
  onlyRootFolder: true,
  dateFrom: 123,
  dateTo: 123,
  uid: "uid",
  first: 123,
  last: 123,
  after: "after",
  before: "before",
  orderField: $envelopeOrderField,
  ascending: true,
  includeTrash: true
);

$response = $sdk->Signplus->listEnvelopes(
  input: $input
);

print_r($response);
```
#### getEnvelope

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getEnvelope(
  envelopeId: "envelopeId"
);

print_r($response);
```
#### deleteEnvelope

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->deleteEnvelope(
  envelopeId: "envelopeId"
);

print_r($response);
```
#### getEnvelopeDocument

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getEnvelopeDocument(
  envelopeId: "envelopeId",
  documentId: "documentId"
);

print_r($response);
```
#### getEnvelopeDocuments

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getEnvelopeDocuments(
  envelopeId: "envelopeId"
);

print_r($response);
```
#### addEnvelopeDocument

```PHP
<?php

use Signplus\Client;
use Signplus\Models\AddEnvelopeDocumentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new AddEnvelopeDocumentRequest(
  file: []
);

$response = $sdk->Signplus->addEnvelopeDocument(
  input: $input,
  envelopeId: "envelopeId"
);

print_r($response);
```
#### setEnvelopeDynamicFields

```PHP
<?php

use Signplus\Client;
use Signplus\Models\DynamicField;
use Signplus\Models\SetEnvelopeDynamicFieldsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$dynamicField = new DynamicField(
  name: "name",
  value: "value"
);

$input = new SetEnvelopeDynamicFieldsRequest(
  dynamicFields: []
);

$response = $sdk->Signplus->setEnvelopeDynamicFields(
  input: $input,
  envelopeId: "envelopeId"
);

print_r($response);
```
#### addEnvelopeSigningSteps

```PHP
<?php

use Signplus\Client;
use Signplus\Models\SigningStep;
use Signplus\Models\AddEnvelopeSigningStepsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new AddEnvelopeSigningStepsRequest(
  signingSteps: []
);

$response = $sdk->Signplus->addEnvelopeSigningSteps(
  input: $input,
  envelopeId: "envelopeId"
);

print_r($response);
```
#### sendEnvelope

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->sendEnvelope(
  envelopeId: "envelopeId"
);

print_r($response);
```
#### duplicateEnvelope

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->duplicateEnvelope(
  envelopeId: "envelopeId"
);

print_r($response);
```
#### voidEnvelope

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->voidEnvelope(
  envelopeId: "envelopeId"
);

print_r($response);
```
#### renameEnvelope

```PHP
<?php

use Signplus\Client;
use Signplus\Models\RenameEnvelopeRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new RenameEnvelopeRequest(
  name: "name"
);

$response = $sdk->Signplus->renameEnvelope(
  input: $input,
  envelopeId: "envelopeId"
);

print_r($response);
```
#### setEnvelopeComment

```PHP
<?php

use Signplus\Client;
use Signplus\Models\SetEnvelopeCommentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new SetEnvelopeCommentRequest(
  comment: "comment"
);

$response = $sdk->Signplus->setEnvelopeComment(
  input: $input,
  envelopeId: "envelopeId"
);

print_r($response);
```
#### setEnvelopeNotification

```PHP
<?php

use Signplus\Client;
use Signplus\Models\EnvelopeNotification;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new EnvelopeNotification(
  subject: "subject",
  message: "message",
  reminderInterval: 123
);

$response = $sdk->Signplus->setEnvelopeNotification(
  input: $input,
  envelopeId: "envelopeId"
);

print_r($response);
```
#### setEnvelopeExpirationDate

```PHP
<?php

use Signplus\Client;
use Signplus\Models\SetEnvelopeExpirationRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new SetEnvelopeExpirationRequest(
  expiresAt: 123
);

$response = $sdk->Signplus->setEnvelopeExpirationDate(
  input: $input,
  envelopeId: "envelopeId"
);

print_r($response);
```
#### setEnvelopeLegalityLevel

```PHP
<?php

use Signplus\Client;
use Signplus\Models\EnvelopeLegalityLevel;
use Signplus\Models\SetEnvelopeLegalityLevelRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new SetEnvelopeLegalityLevelRequest(
  legalityLevel: $envelopeLegalityLevel
);

$response = $sdk->Signplus->setEnvelopeLegalityLevel(
  input: $input,
  envelopeId: "envelopeId"
);

print_r($response);
```
#### getEnvelopeAnnotations

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getEnvelopeAnnotations(
  envelopeId: "envelopeId"
);

print_r($response);
```
#### getEnvelopeDocumentAnnotations

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getEnvelopeDocumentAnnotations(
  envelopeId: "envelopeId",
  documentId: "documentId"
);

print_r($response);
```
#### addEnvelopeAnnotation

```PHP
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

$annotationType = AnnotationType::Text;

$input = new AddAnnotationRequest(
  recipientId: "recipient_id",
  documentId: "document_id",
  page: 123,
  x: 123,
  y: 123,
  width: 123,
  height: 123,
  required: true,
  type: $annotationType,
  signature: $annotationSignature,
  initials: $annotationInitials,
  text: $annotationText,
  datetime: $annotationDateTime,
  checkbox: $annotationCheckbox
);

$response = $sdk->Signplus->addEnvelopeAnnotation(
  input: $input,
  envelopeId: "envelopeId"
);

print_r($response);
```
#### deleteEnvelopeAnnotation

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->deleteEnvelopeAnnotation(
  envelopeId: "envelopeId",
  annotationId: "annotationId"
);

print_r($response);
```
#### createTemplate

```PHP
<?php

use Signplus\Client;
use Signplus\Models\CreateTemplateRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new CreateTemplateRequest(
  name: "name"
);

$response = $sdk->Signplus->createTemplate(
  input: $input
);

print_r($response);
```
#### listTemplates

```PHP
<?php

use Signplus\Client;
use Signplus\Models\TemplateOrderField;
use Signplus\Models\ListTemplatesRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new ListTemplatesRequest(
  name: "name",
  tags: [],
  ids: [],
  first: 123,
  last: 123,
  after: "after",
  before: "before",
  orderField: $templateOrderField,
  ascending: true
);

$response = $sdk->Signplus->listTemplates(
  input: $input
);

print_r($response);
```
#### getTemplate

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getTemplate(
  templateId: "templateId"
);

print_r($response);
```
#### deleteTemplate

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->deleteTemplate(
  templateId: "templateId"
);

print_r($response);
```
#### duplicateTemplate

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->duplicateTemplate(
  templateId: "templateId"
);

print_r($response);
```
#### addTemplateDocument

```PHP
<?php

use Signplus\Client;
use Signplus\Models\AddTemplateDocumentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new AddTemplateDocumentRequest(
  file: []
);

$response = $sdk->Signplus->addTemplateDocument(
  input: $input,
  templateId: "templateId"
);

print_r($response);
```
#### getTemplateDocument

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getTemplateDocument(
  templateId: "templateId",
  documentId: "documentId"
);

print_r($response);
```
#### getTemplateDocuments

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getTemplateDocuments(
  templateId: "templateId"
);

print_r($response);
```
#### addTemplateSigningSteps

```PHP
<?php

use Signplus\Client;
use Signplus\Models\TemplateSigningStep;
use Signplus\Models\AddTemplateSigningStepsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$templateSigningStep = new TemplateSigningStep(
  recipients: []
);

$input = new AddTemplateSigningStepsRequest(
  signingSteps: []
);

$response = $sdk->Signplus->addTemplateSigningSteps(
  input: $input,
  templateId: "templateId"
);

print_r($response);
```
#### renameTemplate

```PHP
<?php

use Signplus\Client;
use Signplus\Models\RenameTemplateRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new RenameTemplateRequest(
  name: "name"
);

$response = $sdk->Signplus->renameTemplate(
  input: $input,
  templateId: "templateId"
);

print_r($response);
```
#### setTemplateComment

```PHP
<?php

use Signplus\Client;
use Signplus\Models\SetTemplateCommentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new SetTemplateCommentRequest(
  comment: "comment"
);

$response = $sdk->Signplus->setTemplateComment(
  input: $input,
  templateId: "templateId"
);

print_r($response);
```
#### setTemplateNotification

```PHP
<?php

use Signplus\Client;
use Signplus\Models\EnvelopeNotification;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new EnvelopeNotification(
  subject: "subject",
  message: "message",
  reminderInterval: 123
);

$response = $sdk->Signplus->setTemplateNotification(
  input: $input,
  templateId: "templateId"
);

print_r($response);
```
#### getTemplateAnnotations

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getTemplateAnnotations(
  templateId: "templateId"
);

print_r($response);
```
#### getDocumentTemplateAnnotations

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->getDocumentTemplateAnnotations(
  templateId: "templateId",
  documentId: "documentId"
);

print_r($response);
```
#### addTemplateAnnotation

```PHP
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

$annotationType = AnnotationType::Text;

$input = new AddAnnotationRequest(
  recipientId: "recipient_id",
  documentId: "document_id",
  page: 123,
  x: 123,
  y: 123,
  width: 123,
  height: 123,
  required: true,
  type: $annotationType,
  signature: $annotationSignature,
  initials: $annotationInitials,
  text: $annotationText,
  datetime: $annotationDateTime,
  checkbox: $annotationCheckbox
);

$response = $sdk->Signplus->addTemplateAnnotation(
  input: $input,
  templateId: "templateId"
);

print_r($response);
```
#### deleteTemplateAnnotation

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->deleteTemplateAnnotation(
  templateId: "templateId",
  annotationId: "annotationId"
);

print_r($response);
```
#### createWebhook

```PHP
<?php

use Signplus\Client;
use Signplus\Models\WebhookEvent;
use Signplus\Models\CreateWebhookRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$webhookEvent = WebhookEvent::EnvelopeExpired;

$input = new CreateWebhookRequest(
  event: $webhookEvent,
  target: "target"
);

$response = $sdk->Signplus->createWebhook(
  input: $input
);

print_r($response);
```
#### listWebhooks

```PHP
<?php

use Signplus\Client;
use Signplus\Models\WebhookEvent;
use Signplus\Models\ListWebhooksRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new ListWebhooksRequest(
  webhookId: "webhook_id",
  event: $webhookEvent
);

$response = $sdk->Signplus->listWebhooks(
  input: $input
);

print_r($response);
```
#### deleteWebhook

```PHP
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->Signplus->deleteWebhook(
  webhookId: "webhookId"
);

print_r($response);
```
