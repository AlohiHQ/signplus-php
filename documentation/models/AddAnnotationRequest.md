# AddAnnotationRequest



**Properties**

| Name | Type | Required | Description |
| :-------- | :----------| :----------| :----------|
    | documentId | string | ✅ | ID of the document |
    | page | integer | ✅ | Page number where the annotation is placed |
    | x | number | ✅ | X coordinate of the annotation (in % of the page width from 0 to 100) from the top left corner |
    | y | number | ✅ | Y coordinate of the annotation (in % of the page height from 0 to 100) from the top left corner |
    | width | number | ✅ | Width of the annotation (in % of the page width from 0 to 100) |
    | height | number | ✅ | Height of the annotation (in % of the page height from 0 to 100) |
    | type | model | ✅ | Type of the annotation |
    | recipientId | string | ❌ | ID of the recipient |
    | required | boolean | ❌ |  |
    | signature | model | ❌ | Signature annotation (null if annotation is not a signature) |
    | initials | model | ❌ | Initials annotation (null if annotation is not initials) |
    | text | model | ❌ | Text annotation (null if annotation is not a text) |
    | datetime | model | ❌ | Date annotation (null if annotation is not a date) |
    | checkbox | model | ❌ | Checkbox annotation (null if annotation is not a checkbox) |


