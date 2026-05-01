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
  id: "<string>"
);


$addEnvelopeAnnotationRequestInitials = new Models\AddEnvelopeAnnotationRequestInitials(
  id: "<string>"
);


$textFont1 = new Models\TextFont1(
  family: "SANS",
  italic: "<boolean>",
  bold: "<boolean>"
);

$addEnvelopeAnnotationRequestText = new Models\AddEnvelopeAnnotationRequestText(
  size: "<number>",
  color: "<number>",
  value: "<string>",
  tooltip: "<string>",
  dynamicFieldName: "<string>",
  font: $textFont1
);


$datetimeFont1 = new Models\DatetimeFont1(
  family: "UNKNOWN",
  italic: "<boolean>",
  bold: "<boolean>"
);

$addEnvelopeAnnotationRequestDatetime = new Models\AddEnvelopeAnnotationRequestDatetime(
  size: "<number>",
  font: $datetimeFont1,
  color: "<string>",
  autoFill: "<boolean>",
  timezone: "<string>",
  timestamp: "<integer>",
  format: "YMD_NUMERIC_SLASH"
);


$addEnvelopeAnnotationRequestCheckbox = new Models\AddEnvelopeAnnotationRequestCheckbox(
  checked: "<boolean>",
  style: "TIMES_SQUARE"
);

$input = new Models\AddEnvelopeAnnotationRequest(
  documentId: "<string>",
  page: "<integer>",
  x: "<float>",
  y: "<float>",
  width: "<float>",
  height: "<float>",
  type: "INITIALS",
  recipientId: "<string>",
  required: "<boolean>",
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


