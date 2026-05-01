<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddTemplateAnnotationRequestDatetime implements \JsonSerializable
{
  #[SerializedName('size')]
  public ?float $size;

  #[SerializedName('font')]
  public ?DatetimeFont2 $font;

  #[SerializedName('color')]
  public ?string $color;

  #[SerializedName('auto_fill')]
  public ?bool $autoFill;

  #[SerializedName('timezone')]
  public ?string $timezone;

  #[SerializedName('timestamp')]
  public ?float $timestamp;

  #[SerializedName('format')]
  public ?string $format;

  public function __construct(
    ?float $size = null,
    ?DatetimeFont2 $font = null,
    ?string $color = null,
    ?bool $autoFill = null,
    ?string $timezone = null,
    ?float $timestamp = null,
    ?string $format = null
  ) {
    $this->size = $size;
    $this->font = $font;
    $this->color = $color;
    $this->autoFill = $autoFill;
    $this->timezone = $timezone;
    $this->timestamp = $timestamp;
    $this->format = $format;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      size: $data['size'] ?? null,
      font: isset($data['font']) && is_array($data['font'])
        ? DatetimeFont2::fromArray($data['font'])
        : null,
      color: $data['color'] ?? null,
      autoFill: $data['auto_fill'] ?? null,
      timezone: $data['timezone'] ?? null,
      timestamp: $data['timestamp'] ?? null,
      format: $data['format'] ?? null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'size' => $this->size,
      'font' => $this->font,
      'color' => $this->color,
      'auto_fill' => $this->autoFill,
      'timezone' => $this->timezone,
      'timestamp' => $this->timestamp,
      'format' => $this->format
    ];

    foreach (
      ['size', 'font', 'color', 'auto_fill', 'timezone', 'timestamp', 'format']
      as $optionalKey
    ) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
