<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class EnvelopeNotification
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

    public function __construct(?string $subject = null, ?string $message = null, ?int $reminderInterval = null)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->reminderInterval = $reminderInterval;
    }
}
