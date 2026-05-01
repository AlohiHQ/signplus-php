# SetExpirationDate

A list of all methods in the `SetExpirationDate` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_envelope_expiration_date](#set_envelope_expiration_date)| Set envelope expiration date |

## set_envelope_expiration_date

Set envelope expiration date


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/set_expiration_date`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeExpirationDateRequest | ✅ | Set envelope expiration date |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetEnvelopeExpirationDateRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\SetEnvelopeExpirationDateRequest(
  expiresAt: "<integer>"
);

$response = $sdk->setExpirationDate->setEnvelopeExpirationDate(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


