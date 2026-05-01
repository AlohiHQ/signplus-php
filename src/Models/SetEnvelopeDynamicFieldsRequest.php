<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeDynamicFieldsRequest implements \JsonSerializable
{
  /**
   * @var DynamicFields[]|null
   */
  #[SerializedName('dynamic_fields')]
  public ?array $dynamicFields;

  public function __construct(?array $dynamicFields = [])
  {
    $this->dynamicFields = $dynamicFields;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      dynamicFields: isset($data['dynamic_fields']) && is_array($data['dynamic_fields'])
        ? array_map(
          fn($item) => is_array($item) ? DynamicFields::fromArray($item) : $item,
          $data['dynamic_fields']
        )
        : null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'dynamic_fields' => $this->dynamicFields
    ];

    foreach (['dynamic_fields'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
