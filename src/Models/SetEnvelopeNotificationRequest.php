<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeNotificationRequest implements \JsonSerializable
{
  #[SerializedName('subject')]
  public ?string $subject;

  #[SerializedName('message')]
  public ?string $message;

  #[SerializedName('reminder_interval')]
  public ?float $reminderInterval;

  public function __construct(
    ?string $subject = null,
    ?string $message = null,
    ?float $reminderInterval = null
  ) {
    $this->subject = $subject;
    $this->message = $message;
    $this->reminderInterval = $reminderInterval;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      subject: $data['subject'] ?? null,
      message: $data['message'] ?? null,
      reminderInterval: $data['reminder_interval'] ?? null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'subject' => $this->subject,
      'message' => $this->message,
      'reminder_interval' => $this->reminderInterval
    ];

    foreach (['subject', 'message', 'reminder_interval'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
