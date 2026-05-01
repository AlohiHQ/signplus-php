<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddEnvelopeDocumentRequest implements \JsonSerializable
{
  /**
   * @var resource|false*/
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
    return new self(file: $data['file'] ?? null);
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'file' => $this->file
    ];

    foreach (['file'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

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
}
