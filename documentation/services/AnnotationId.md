# AnnotationId

A list of all methods in the `AnnotationId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[delete_envelope_annotation](#delete_envelope_annotation)| Delete envelope annotation |

## delete_envelope_annotation

Delete envelope annotation


- HTTP Method: `DELETE`
- Endpoint: `/envelope/{envelope_id}/annotation/{annotation_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |
| $annotationId | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->annotationId->deleteEnvelopeAnnotation(
  envelopeId: "envelope_id",
  annotationId: "annotation_id"
);

print_r($response);
```


