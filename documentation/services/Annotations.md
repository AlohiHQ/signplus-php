# Annotations

A list of all methods in the `Annotations` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_envelope_annotations](#get_envelope_annotations)| Get envelope annotations |

## get_envelope_annotations

Get envelope annotations


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/annotations`

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

$response = $sdk->annotations->getEnvelopeAnnotations(
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


