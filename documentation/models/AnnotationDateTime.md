# AnnotationDateTime

Date annotation (null if annotation is not a date)

**Properties**

| Name | Type | Required | Description |
| :-------- | :----------| :----------| :----------|
    | size | float | ❌ | Font size of the text in pt |
    | font | [AnnotationFont](AnnotationFont.md) | ❌ |  |
    | color | string | ❌ | Color of the text in hex format |
    | auto_fill | bool | ❌ | Whether the date should be automatically filled |
    | timezone | string | ❌ | Timezone of the date |
    | timestamp | int | ❌ | Unix timestamp of the date |
    | format | [AnnotationDateTimeFormat](AnnotationDateTimeFormat.md) | ❌ | Format of the date time (DMY_NUMERIC_SLASH is day/month/year with slashes, MDY_NUMERIC_SLASH is month/day/year with slashes, YMD_NUMERIC_SLASH is year/month/day with slashes, DMY_NUMERIC_DASH_SHORT is day/month/year with dashes, DMY_NUMERIC_DASH is day/month/year with dashes, YMD_NUMERIC_DASH is year/month/day with dashes, MDY_TEXT_DASH_SHORT is month/day/year with dashes, MDY_TEXT_SPACE_SHORT is month/day/year with spaces, MDY_TEXT_SPACE is month/day/year with spaces) |


