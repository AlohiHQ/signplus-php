# EnvelopeId

A list of all methods in the `EnvelopeId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_envelope](#get_envelope)| Get envelope |
|[delete_envelope](#delete_envelope)| Delete envelope |

## get_envelope

Get envelope


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->envelopeId->getEnvelope(
  accept: "application/json",
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

$response = $sdk->envelopeId->deleteEnvelope(
  envelopeId: "envelope_id"
);

print_r($response);
```


