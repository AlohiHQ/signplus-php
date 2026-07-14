<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddTemplateSigningStepsRequest implements \JsonSerializable
{
  /**
   * @var TemplateSigningStep[]
   * List of signing steps
   */
  #[SerializedName('signing_steps')]
  public array $signingSteps;

  public function __construct(array $signingSteps)
  {
    $this->signingSteps = $signingSteps;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(
      signingSteps: array_map(
        fn($item) => is_array($item) ? TemplateSigningStep::fromArray($item) : $item,
        $data['signing_steps']
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
    $result['signing_steps'] = $this->signingSteps;
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'signingSteps',
        'contents' => json_encode($this->signingSteps)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->signingSteps as $item) {
      $item->validate();
    }
  }
}
