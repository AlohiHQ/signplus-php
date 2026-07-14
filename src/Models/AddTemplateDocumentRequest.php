<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddTemplateDocumentRequest implements \JsonSerializable
{
  /**
   * @var resource*/
  #[SerializedName('file')]
  public mixed $file;

  public function __construct(mixed $file)
  {
    $this->file = $file;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(file: $data['file']);

    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    $result['file'] = $this->file;
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'file',
        'contents' => $this->file,
        'filename' => 'file.pdf'
      ]
    ];
  }

  public function validate(): void
  {
  }
}
