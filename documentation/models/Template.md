# Template



**Properties**

| Name | Type | Required | Description |
| :-------- | :----------| :----------| :----------|
    | id | string | ❌ | Unique identifier of the template |
    | name | string | ❌ | Name of the template |
    | comment | string | ❌ | Comment for the template |
    | pages | integer | ❌ | Total number of pages in the template |
    | legalityLevel | model | ❌ | Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes) |
    | createdAt | integer | ❌ | Unix timestamp of the creation date |
    | updatedAt | integer | ❌ | Unix timestamp of the last modification date |
    | expirationDelay | integer | ❌ | Expiration delay added to the current time when an envelope is created from this template |
    | numRecipients | integer | ❌ | Number of recipients in the envelope |
    | signingSteps | array | ❌ |  |
    | documents | array | ❌ |  |
    | notification | model | ❌ |  |
    | dynamicFields | array | ❌ | List of dynamic fields |


