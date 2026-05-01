# SetLegalityLevel

A list of all methods in the `SetLegalityLevel` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_envelope_legality_level](#set_envelope_legality_level)| Set envelope legality level |

## set_envelope_legality_level

Set envelope legality level


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/set_legality_level`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeLegalityLevelRequest | ✅ | Set envelope legality level |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetEnvelopeLegalityLevelRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\SetEnvelopeLegalityLevelRequest(
  legalityLevel: "QES_EIDAS"
);

$response = $sdk->setLegalityLevel->setEnvelopeLegalityLevel(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


