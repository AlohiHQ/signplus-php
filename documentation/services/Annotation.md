# Annotation

A list of all methods in the `Annotation` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[add_envelope_annotation](#add_envelope_annotation)| Add envelope annotation |

## add_envelope_annotation

Add envelope annotation


- HTTP Method: `POST`
- Endpoint: `/envelope/{envelope_id}/annotation`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\AddEnvelopeAnnotationRequest | ✅ | Add envelope annotation |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\AddEnvelopeAnnotationRequestSignature;
use Signplus\Models\AddEnvelopeAnnotationRequestInitials;
use Signplus\Models\AddEnvelopeAnnotationRequestText;
use Signplus\Models\AddEnvelopeAnnotationRequestDatetime;
use Signplus\Models\AddEnvelopeAnnotationRequestCheckbox;
use Signplus\Models\AddEnvelopeAnnotationRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$addEnvelopeAnnotationRequestSignature = new Models\AddEnvelopeAnnotationRequestSignature(
  id: "string"
);


$addEnvelopeAnnotationRequestInitials = new Models\AddEnvelopeAnnotationRequestInitials(
  id: "string"
);


$textFont1 = new Models\TextFont1(
  family: "SANS",
  italic: false,
  bold: false
);

$addEnvelopeAnnotationRequestText = new Models\AddEnvelopeAnnotationRequestText(
  size: 6190.822136605691,
  color: 6489.781325519173,
  value: "string",
  tooltip: "string",
  dynamicFieldName: "string",
  font: $textFont1
);


$datetimeFont1 = new Models\DatetimeFont1(
  family: "SERIF",
  italic: false,
  bold: false
);

$addEnvelopeAnnotationRequestDatetime = new Models\AddEnvelopeAnnotationRequestDatetime(
  size: 3773.1065479576364,
  font: $datetimeFont1,
  color: "string",
  autoFill: true,
  timezone: "string",
  timestamp: 6868,
  format: "MDY_TEXT_SPACE_SHORT"
);


$addEnvelopeAnnotationRequestCheckbox = new Models\AddEnvelopeAnnotationRequestCheckbox(
  checked: false,
  style: "SQUARE_CHECK"
);

$input = new Models\AddEnvelopeAnnotationRequest(
  documentId: "string",
  page: 6387,
  x: 4410.13346533615,
  y: 5148.888749329143,
  width: 3756.0248729763225,
  height: 4178.76189579703,
  type: "INITIALS",
  recipientId: "string",
  required: false,
  signature: $addEnvelopeAnnotationRequestSignature,
  initials: $addEnvelopeAnnotationRequestInitials,
  text: $addEnvelopeAnnotationRequestText,
  datetime: $addEnvelopeAnnotationRequestDatetime,
  checkbox: $addEnvelopeAnnotationRequestCheckbox
);

$response = $sdk->annotation->addEnvelopeAnnotation(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


