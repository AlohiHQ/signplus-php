# SetComment

A list of all methods in the `SetComment` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[set_envelope_comment](#set_envelope_comment)| Set envelope comment |

## set_envelope_comment

Set envelope comment


- HTTP Method: `PUT`
- Endpoint: `/envelope/{envelope_id}/set_comment`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\SetEnvelopeCommentRequest | ✅ | Set envelope comment |
| $envelopeId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\SetEnvelopeCommentRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\SetEnvelopeCommentRequest(
  comment: "<string>"
);

$response = $sdk->setComment->setEnvelopeComment(
  input: $input,
  accept: "application/json",
  envelopeId: "envelope_id"
);

print_r($response);
```


