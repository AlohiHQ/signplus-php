<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddTemplateSigningStepsRequestSigningSteps implements \JsonSerializable
{
  /**
   * @var SigningStepsRecipients2[]|null
   */
  #[SerializedName('recipients')]
  public ?array $recipients;

  public function __construct(?array $recipients = [])
  {
    $this->recipients = $recipients;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      recipients: isset($data['recipients']) && is_array($data['recipients'])
        ? array_map(
          fn($item) => is_array($item) ? SigningStepsRecipients2::fromArray($item) : $item,
          $data['recipients']
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
      'recipients' => $this->recipients
    ];

    foreach (['recipients'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
