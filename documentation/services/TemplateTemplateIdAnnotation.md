# TemplateTemplateIdAnnotation

A list of all methods in the `TemplateTemplateIdAnnotation` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[add_template_annotation](#add_template_annotation)| Add template annotation |

## add_template_annotation

Add template annotation


- HTTP Method: `POST`
- Endpoint: `/template/{template_id}/annotation`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddTemplateAnnotationRequest | ✅ | Add template annotation |
| $templateId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AddTemplateAnnotationRequestSignature;
use Signplus\Models\AddTemplateAnnotationRequestInitials;
use Signplus\Models\AddTemplateAnnotationRequestText;
use Signplus\Models\AddTemplateAnnotationRequestDatetime;
use Signplus\Models\AddTemplateAnnotationRequestCheckbox;
use Signplus\Models\AddTemplateAnnotationRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$addTemplateAnnotationRequestSignature = new Models\AddTemplateAnnotationRequestSignature(
  id: "<string>"
);


$addTemplateAnnotationRequestInitials = new Models\AddTemplateAnnotationRequestInitials(
  id: "<string>"
);


$textFont2 = new Models\TextFont2(
  family: "SANS",
  italic: "<boolean>",
  bold: "<boolean>"
);

$addTemplateAnnotationRequestText = new Models\AddTemplateAnnotationRequestText(
  size: "<number>",
  color: "<number>",
  value: "<string>",
  tooltip: "<string>",
  dynamicFieldName: "<string>",
  font: $textFont2
);


$datetimeFont2 = new Models\DatetimeFont2(
  family: "UNKNOWN",
  italic: "<boolean>",
  bold: "<boolean>"
);

$addTemplateAnnotationRequestDatetime = new Models\AddTemplateAnnotationRequestDatetime(
  size: "<number>",
  font: $datetimeFont2,
  color: "<string>",
  autoFill: "<boolean>",
  timezone: "<string>",
  timestamp: "<integer>",
  format: "YMD_NUMERIC_SLASH"
);


$addTemplateAnnotationRequestCheckbox = new Models\AddTemplateAnnotationRequestCheckbox(
  checked: "<boolean>",
  style: "TIMES_SQUARE"
);

$input = new Models\AddTemplateAnnotationRequest(
  documentId: "<string>",
  page: "<integer>",
  x: "<float>",
  y: "<float>",
  width: "<float>",
  height: "<float>",
  type: "INITIALS",
  recipientId: "<string>",
  required: "<boolean>",
  signature: $addTemplateAnnotationRequestSignature,
  initials: $addTemplateAnnotationRequestInitials,
  text: $addTemplateAnnotationRequestText,
  datetime: $addTemplateAnnotationRequestDatetime,
  checkbox: $addTemplateAnnotationRequestCheckbox
);

$response = $sdk->templateTemplateIdAnnotation->addTemplateAnnotation(
  input: $input,
  accept: "application/json",
  templateId: "template_id"
);

print_r($response);
```


