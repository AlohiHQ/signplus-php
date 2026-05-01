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
  id: "string"
);


$addTemplateAnnotationRequestInitials = new Models\AddTemplateAnnotationRequestInitials(
  id: "string"
);


$textFont2 = new Models\TextFont2(
  family: "SANS",
  italic: false,
  bold: false
);

$addTemplateAnnotationRequestText = new Models\AddTemplateAnnotationRequestText(
  size: 6190.822136605691,
  color: 6489.781325519173,
  value: "string",
  tooltip: "string",
  dynamicFieldName: "string",
  font: $textFont2
);


$datetimeFont2 = new Models\DatetimeFont2(
  family: "SERIF",
  italic: false,
  bold: false
);

$addTemplateAnnotationRequestDatetime = new Models\AddTemplateAnnotationRequestDatetime(
  size: 3773.1065479576364,
  font: $datetimeFont2,
  color: "string",
  autoFill: true,
  timezone: "string",
  timestamp: 6868,
  format: "MDY_TEXT_SPACE_SHORT"
);


$addTemplateAnnotationRequestCheckbox = new Models\AddTemplateAnnotationRequestCheckbox(
  checked: false,
  style: "SQUARE_CHECK"
);

$input = new Models\AddTemplateAnnotationRequest(
  documentId: "string",
  page: 6387,
  x: 4410.13346533615,
  y: 5148.888749329143,
  width: 3756.0248729763225,
  height: 4178.76189579703,
  type: "INITIALS",
  recipientId: "string",
  required: false,
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


