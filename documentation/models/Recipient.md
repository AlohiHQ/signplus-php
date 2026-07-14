# Recipient



**Properties**

| Name | Type | Required | Description |
| :-------- | :----------| :----------| :----------|
    | name | string | ✅ | Name of the recipient |
    | email | string | ✅ | Email of the recipient |
    | role | [RecipientRole](RecipientRole.md) | ✅ | Role of the recipient (SIGNER signs the document, RECEIVES_COPY receives a copy of the document, IN_PERSON_SIGNER signs the document in person, SENDER sends the document) |
    | id | string | ❌ | Unique identifier of the recipient |
    | uid | string | ❌ | Unique identifier of the user associated with the recipient |
    | verification | [RecipientVerification](RecipientVerification.md) | ❌ |  |


