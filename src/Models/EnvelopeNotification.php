<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class EnvelopeNotification implements \JsonSerializable
{
  /**
   * Subject of the notification
   */
  #[SerializedName('subject')]
  public ?string $subject;

  /**
   * Message of the notification
   */
  #[SerializedName('message')]
  public ?string $message;

  /**
   * Interval in days to send reminder
   */
  #[SerializedName('reminder_interval')]
  public ?int $reminderInterval;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?string $subject = null,
    ?string $message = null,
    ?int $reminderInterval = null
  ) {
    $this->subject = $subject;
    $this->message = $message;
    $this->reminderInterval = $reminderInterval;

    if ($subject !== null) {
      $this->_dirtyFields['subject'] = true;
    }
    if ($message !== null) {
      $this->_dirtyFields['message'] = true;
    }
    if ($reminderInterval !== null) {
      $this->_dirtyFields['reminder_interval'] = true;
    }
  }

  /**
   * Mark one or more optional fields as explicitly set so they are
   * included in {@see jsonSerialize()} output.
   *
   * Constructor-created objects automatically track required fields and
   * any optional field passed with a non-default value. Use this method
   * to force-include a field that was left at its default (e.g. explicit null):
   *
   *     $pet = new Pet(name: 'Buddy');
   *     $pet->setFields('tag'); // tag (null) will now appear in JSON
   *
   * Objects created via {@see fromArray()} already track every field
   * present in the input data, so setFields() is not needed for them.
   *
   * @param string ...$fields JSON field names (original API names) to mark as set
   * @return static
   */
  public function setFields(string ...$fields): static
  {
    foreach ($fields as $field) {
      $this->_dirtyFields[$field] = true;
    }
    return $this;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    $instance = new self(
      subject: $data['subject'] ?? null,
      message: $data['message'] ?? null,
      reminderInterval: $data['reminder_interval'] ?? null
    );
    $instance->_dirtyFields = [];
    foreach (['subject', 'message', 'reminder_interval'] as $field) {
      if (array_key_exists($field, $data)) {
        $instance->_dirtyFields[$field] = true;
      }
    }
    return $instance;
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [];
    if (array_key_exists('subject', $this->_dirtyFields)) {
      $result['subject'] = $this->subject;
    }
    if (array_key_exists('message', $this->_dirtyFields)) {
      $result['message'] = $this->message;
    }
    if (array_key_exists('reminder_interval', $this->_dirtyFields)) {
      $result['reminder_interval'] = $this->reminderInterval;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'subject',
        'contents' => $this->subject
      ],

      [
        'name' => 'message',
        'contents' => $this->message
      ],

      [
        'name' => 'reminderInterval',
        'contents' => (string) $this->reminderInterval
      ]
    ];
  }

  public function validate(): void
  {
  }
}
