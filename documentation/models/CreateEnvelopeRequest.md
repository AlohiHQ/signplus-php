# CreateEnvelopeRequest



**Properties**

| Name | Type | Required | Description |
| :-------- | :----------| :----------| :----------|
    | name | string | ✅ | Name of the envelope |
    | legalityLevel | model | ✅ | Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes) |
    | expiresAt | integer | ❌ | Unix timestamp of the expiration date |
    | comment | string | ❌ | Comment for the envelope |
    | sandbox | boolean | ❌ | Whether the envelope is created in sandbox mode |


