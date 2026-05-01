# Envelopes

A list of all methods in the `Envelopes` service. Click on the method name to view detailed information about that method.

| Methods | Description |
| :------ | :---------- |
|[list_envelopes](#list_envelopes)| List envelopes |

## list_envelopes

List envelopes


- HTTP Method: `POST`
- Endpoint: `/envelopes`

**Parameters**

| Name    | Type| Required | Description |
| :-------- | :----------| :----------| :----------|
| input | Models\ListEnvelopesRequest | ✅ | List envelopes |
| $accept | string | ✅ |  |

**Return Type**

`mixed`

**Example Usage Code Snippet**
```php
<?php

use Signplus\Client;
use Signplus\Models\ListEnvelopesRequest;

$sdk = new Client(accessToken: 'YOUR_TOKEN');


$input = new Models\ListEnvelopesRequest(
  name: "string",
  tags: [],
  comment: "string",
  ids: [],
  statuses: [],
  folderIds: [],
  onlyRootFolder: false,
  dateFrom: 6508,
  dateTo: 690,
  uid: "string",
  first: 6875,
  last: 4384,
  after: "string",
  before: "string",
  orderField: "LAST_DOCUMENT_CHANGE",
  ascending: false,
  includeTrash: false
);

$response = $sdk->envelopes->listEnvelopes(
  input: $input,
  accept: "application/json"
);

print_r($response);
```


