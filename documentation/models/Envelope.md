# Envelope



**Properties**

| Name | Type | Required | Description |
| :-------- | :----------| :----------| :----------|
    | id | string | ❌ | Unique identifier of the envelope |
    | name | string | ❌ | Name of the envelope |
    | comment | string | ❌ | Comment for the envelope |
    | pages | integer | ❌ | Total number of pages in the envelope |
    | flowType | model | ❌ | Flow type of the envelope (REQUEST_SIGNATURE is a request for signature, SIGN_MYSELF is a self-signing flow) |
    | legalityLevel | model | ❌ | Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes) |
    | status | model | ❌ | Status of the envelope |
    | createdAt | integer | ❌ | Unix timestamp of the creation date |
    | updatedAt | integer | ❌ | Unix timestamp of the last modification date |
    | expiresAt | integer | ❌ | Unix timestamp of the expiration date |
    | numRecipients | integer | ❌ | Number of recipients in the envelope |
    | isDuplicable | boolean | ❌ | Whether the envelope can be duplicated |
    | signingSteps | array | ❌ |  |
    | documents | array | ❌ |  |
    | notification | model | ❌ |  |
    | attachments | model | ❌ |  |


