<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddEnvelopeAnnotationRequestCheckbox implements \JsonSerializable
{
  #[SerializedName('checked')]
  public ?string $checked;

  #[SerializedName('style')]
  public ?string $style;

  public function __construct(?string $checked = null, ?string $style = null)
  {
    $this->checked = $checked;
    $this->style = $style;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(checked: $data['checked'] ?? null, style: $data['style'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'checked' => $this->checked,
      'style' => $this->style
    ];

    foreach (['checked', 'style'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
