# Annotation



**Properties**

| Name | Type | Required | Description |
| :-------- | :----------| :----------| :----------|
    | id | string | ❌ | Unique identifier of the annotation |
    | recipient_id | string | ❌ | ID of the recipient |
    | document_id | string | ❌ | ID of the document |
    | page | int | ❌ | Page number where the annotation is placed |
    | x | float | ❌ | X coordinate of the annotation (in % of the page width from 0 to 100) from the top left corner |
    | y | float | ❌ | Y coordinate of the annotation (in % of the page height from 0 to 100) from the top left corner |
    | width | float | ❌ | Width of the annotation (in % of the page width from 0 to 100) |
    | height | float | ❌ | Height of the annotation (in % of the page height from 0 to 100) |
    | required | bool | ❌ | Whether the annotation is required |
    | type | [AnnotationType](AnnotationType.md) | ❌ | Type of the annotation |
    | signature | [AnnotationSignature](AnnotationSignature.md) | ❌ | Signature annotation (null if annotation is not a signature) |
    | initials | [AnnotationInitials](AnnotationInitials.md) | ❌ | Initials annotation (null if annotation is not initials) |
    | text | [AnnotationText](AnnotationText.md) | ❌ | Text annotation (null if annotation is not a text) |
    | datetime | [AnnotationDateTime](AnnotationDateTime.md) | ❌ | Date annotation (null if annotation is not a date) |
    | checkbox | [AnnotationCheckbox](AnnotationCheckbox.md) | ❌ | Checkbox annotation (null if annotation is not a checkbox) |


