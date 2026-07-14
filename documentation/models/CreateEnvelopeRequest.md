# CreateEnvelopeRequest



**Properties**

| Name | Type | Required | Description |
| :-------- | :----------| :----------| :----------|
    | name | string | ✅ | Name of the envelope |
    | legality_level | [EnvelopeLegalityLevel](EnvelopeLegalityLevel.md) | ✅ | Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes) |
    | expires_at | int | ❌ | Unix timestamp of the expiration date |
    | comment | string | ❌ | Comment for the envelope |
    | sandbox | bool | ❌ | Whether the envelope is created in sandbox mode |


