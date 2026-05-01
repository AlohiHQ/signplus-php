<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddEnvelopeAnnotationRequestText implements \JsonSerializable
{
  #[SerializedName('size')]
  public ?string $size;

  #[SerializedName('color')]
  public ?string $color;

  #[SerializedName('value')]
  public ?string $value;

  #[SerializedName('tooltip')]
  public ?string $tooltip;

  #[SerializedName('dynamic_field_name')]
  public ?string $dynamicFieldName;

  #[SerializedName('font')]
  public ?TextFont1 $font;

  public function __construct(
    ?string $size = null,
    ?string $color = null,
    ?string $value = null,
    ?string $tooltip = null,
    ?string $dynamicFieldName = null,
    ?TextFont1 $font = null
  ) {
    $this->size = $size;
    $this->color = $color;
    $this->value = $value;
    $this->tooltip = $tooltip;
    $this->dynamicFieldName = $dynamicFieldName;
    $this->font = $font;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      size: $data['size'] ?? null,
      color: $data['color'] ?? null,
      value: $data['value'] ?? null,
      tooltip: $data['tooltip'] ?? null,
      dynamicFieldName: $data['dynamic_field_name'] ?? null,
      font: isset($data['font']) && is_array($data['font'])
        ? TextFont1::fromArray($data['font'])
        : null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'size' => $this->size,
      'color' => $this->color,
      'value' => $this->value,
      'tooltip' => $this->tooltip,
      'dynamic_field_name' => $this->dynamicFieldName,
      'font' => $this->font
    ];

    foreach (['size', 'color', 'value', 'tooltip', 'dynamic_field_name', 'font'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
