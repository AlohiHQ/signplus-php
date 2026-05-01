<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddEnvelopeSigningStepsRequest implements \JsonSerializable
{
  /**
   * @var AddEnvelopeSigningStepsRequestSigningSteps[]|null
   */
  #[SerializedName('signing_steps')]
  public ?array $signingSteps;

  public function __construct(?array $signingSteps = [])
  {
    $this->signingSteps = $signingSteps;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      signingSteps: isset($data['signing_steps']) && is_array($data['signing_steps'])
        ? array_map(
          fn($item) => is_array($item)
            ? AddEnvelopeSigningStepsRequestSigningSteps::fromArray($item)
            : $item,
          $data['signing_steps']
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
      'signing_steps' => $this->signingSteps
    ];

    foreach (['signing_steps'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
