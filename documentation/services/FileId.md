# FileId

A list of all methods in the `FileId` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[get_attachment_file](#get_attachment_file)| Get envelope attachment file |

## get_attachment_file

Get envelope attachment file


- HTTP Method: `GET`
- Endpoint: `/envelope/{envelope_id}/attachments/{file_id}`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| $envelopeId | string | ✅ |  |
| $fileId | string | ✅ |  |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;

$sdk = new Client(accessToken: 'YOUR_TOKEN');

$response = $sdk->fileId->getAttachmentFile(
  accept: "application/octet-stream",
  envelopeId: "envelope_id",
  fileId: "file_id"
);

print_r($response);
```


