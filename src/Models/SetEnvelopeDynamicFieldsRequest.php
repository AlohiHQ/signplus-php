<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeDynamicFieldsRequest implements \JsonSerializable
{
  /**
   * @var DynamicField[]
   * List of dynamic fields
   */
  #[SerializedName('dynamic_fields')]
  public array $dynamicFields;

  public function __construct(array $dynamicFields)
  {
    $this->dynamicFields = $dynamicFields;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(
      dynamicFields: array_map(
        fn($item) => is_array($item) ? DynamicField::fromArray($item) : $item,
        $data['dynamic_fields']
      )
    );

    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    $result['dynamic_fields'] = $this->dynamicFields;
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'dynamicFields',
        'contents' => json_encode($this->dynamicFields)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->dynamicFields as $item) {
      $item->validate();
    }
  }
}
