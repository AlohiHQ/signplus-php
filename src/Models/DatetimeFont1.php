<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class DatetimeFont1 implements \JsonSerializable
{
  #[SerializedName('family')]
  public ?string $family;

  #[SerializedName('italic')]
  public ?bool $italic;

  #[SerializedName('bold')]
  public ?bool $bold;

  public function __construct(?string $family = null, ?bool $italic = null, ?bool $bold = null)
  {
    $this->family = $family;
    $this->italic = $italic;
    $this->bold = $bold;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      family: $data['family'] ?? null,
      italic: $data['italic'] ?? null,
      bold: $data['bold'] ?? null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'family' => $this->family,
      'italic' => $this->italic,
      'bold' => $this->bold
    ];

    foreach (['family', 'italic', 'bold'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
