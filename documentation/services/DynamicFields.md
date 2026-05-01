# DynamicFields

A list of all methods in the `DynamicFields` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_envelope_dynamic_fields](#set_envelope_dynamic_fields)| Set envelope dynamic fields |

## set_envelope_dynamic_fields

Set envelope dynamic fields


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/dynamic_fields`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeDynamicFieldsRequest | ✅ | Set envelope dynamic fields |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\DynamicFields;
use Signplus\Models\SetEnvelopeDynamicFieldsRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$dynamicFields = new Models\DynamicFields(
  name: "<string>",
  value: "<string>"
);

$input = new Models\SetEnvelopeDynamicFieldsRequest(
  dynamicFields: []
);

$response = $sdk->dynamicFields->setEnvelopeDynamicFields(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


