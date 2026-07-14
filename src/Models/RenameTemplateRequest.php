<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class RenameTemplateRequest implements \JsonSerializable
{
  /**
   * Name of the template
   */
  #[SerializedName('name')]
  public string $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(name: $data['name']);

    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    $result['name'] = $this->name;
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'name',
        'contents' => $this->name
      ]
    ];
  }

  public function validate(): void
  {
  }
}
