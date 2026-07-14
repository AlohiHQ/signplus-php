# ListEnvelopesRequest



**Properties**

| Name | Type | Required | Description |
| :-------- | :----------| :----------| :----------|
    | name | string | ❌ | Name of the envelope |
    | tags | string[] | ❌ | List of tags |
    | comment | string | ❌ | Comment of the envelope |
    | ids | string[] | ❌ | List of envelope IDs |
    | statuses | [EnvelopeStatus](EnvelopeStatus.md)[] | ❌ | List of envelope statuses |
    | folder_ids | string[] | ❌ | List of folder IDs |
    | only_root_folder | bool | ❌ | Whether to only list envelopes in the root folder |
    | date_from | int | ❌ | Unix timestamp of the start date |
    | date_to | int | ❌ | Unix timestamp of the end date |
    | uid | string | ❌ | Unique identifier of the user |
    | first | int | ❌ |  |
    | last | int | ❌ |  |
    | after | string | ❌ |  |
    | before | string | ❌ |  |
    | order_field | [EnvelopeOrderField](EnvelopeOrderField.md) | ❌ | Field to order envelopes by |
    | ascending | bool | ❌ | Whether to order envelopes in ascending order |
    | include_trash | bool | ❌ | Whether to include envelopes in the trash |


