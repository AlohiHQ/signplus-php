# ListEnvelopesRequest



**Properties**

| Name | Type | Required | Description |
| :-------- | :----------| :----------| :----------|
    | name | string | ❌ | Name of the envelope |
    | tags | array | ❌ | List of tags |
    | comment | string | ❌ | Comment of the envelope |
    | ids | array | ❌ | List of envelope IDs |
    | statuses | array | ❌ | List of envelope statuses |
    | folderIds | array | ❌ | List of folder IDs |
    | onlyRootFolder | boolean | ❌ | Whether to only list envelopes in the root folder |
    | dateFrom | integer | ❌ | Unix timestamp of the start date |
    | dateTo | integer | ❌ | Unix timestamp of the end date |
    | uid | string | ❌ | Unique identifier of the user |
    | first | integer | ❌ |  |
    | last | integer | ❌ |  |
    | after | string | ❌ |  |
    | before | string | ❌ |  |
    | orderField | model | ❌ | Field to order envelopes by |
    | ascending | boolean | ❌ | Whether to order envelopes in ascending order |
    | includeTrash | boolean | ❌ | Whether to include envelopes in the trash |


