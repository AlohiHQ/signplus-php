<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Envelope implements \JsonSerializable
{
  /**
   * Unique identifier of the envelope
   */
  #[SerializedName('id')]
  public ?string $id;

  /**
   * Name of the envelope
   */
  #[SerializedName('name')]
  public ?string $name;

  /**
   * Comment for the envelope
   */
  #[SerializedName('comment')]
  public ?string $comment;

  /**
   * Total number of pages in the envelope
   */
  #[SerializedName('pages')]
  public ?int $pages;

  /**
   * Flow type of the envelope (REQUEST_SIGNATURE is a request for signature, SIGN_MYSELF is a self-signing flow)
   */
  #[SerializedName('flow_type')]
  public ?EnvelopeFlowType $flowType;

  /**
   * Legal level of the envelope (SES is Simple Electronic Signature, QES_EIDAS is Qualified Electronic Signature, QES_ZERTES is Qualified Electronic Signature with Zertes)
   */
  #[SerializedName('legality_level')]
  public ?EnvelopeLegalityLevel $legalityLevel;

  /**
   * Status of the envelope
   */
  #[SerializedName('status')]
  public ?EnvelopeStatus $status;

  /**
   * Unix timestamp of the creation date
   */
  #[SerializedName('created_at')]
  public ?int $createdAt;

  /**
   * Unix timestamp of the last modification date
   */
  #[SerializedName('updated_at')]
  public ?int $updatedAt;

  /**
   * Unix timestamp of the expiration date
   */
  #[SerializedName('expires_at')]
  public ?int $expiresAt;

  /**
   * Number of recipients in the envelope
   */
  #[SerializedName('num_recipients')]
  public ?int $numRecipients;

  /**
   * Whether the envelope can be duplicated
   */
  #[SerializedName('is_duplicable')]
  public ?bool $isDuplicable;

  /**
   * @var SigningStep[]|null
   */
  #[SerializedName('signing_steps')]
  public ?array $signingSteps;

  /**
   * @var Document[]|null
   */
  #[SerializedName('documents')]
  public ?array $documents;

  #[SerializedName('notification')]
  public ?EnvelopeNotification $notification;

  #[SerializedName('attachments')]
  public ?EnvelopeAttachments $attachments;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?string $id = null,
    ?string $name = null,
    ?string $comment = null,
    ?int $pages = null,
    ?EnvelopeFlowType $flowType = null,
    ?EnvelopeLegalityLevel $legalityLevel = null,
    ?EnvelopeStatus $status = null,
    ?int $createdAt = null,
    ?int $updatedAt = null,
    ?int $expiresAt = null,
    ?int $numRecipients = null,
    ?bool $isDuplicable = null,
    ?array $signingSteps = null,
    ?array $documents = null,
    ?EnvelopeNotification $notification = null,
    ?EnvelopeAttachments $attachments = null
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->comment = $comment;
    $this->pages = $pages;
    $this->flowType = $flowType;
    $this->legalityLevel = $legalityLevel;
    $this->status = $status;
    $this->createdAt = $createdAt;
    $this->updatedAt = $updatedAt;
    $this->expiresAt = $expiresAt;
    $this->numRecipients = $numRecipients;
    $this->isDuplicable = $isDuplicable;
    $this->signingSteps = $signingSteps ?? [];
    $this->documents = $documents ?? [];
    $this->notification = $notification;
    $this->attachments = $attachments;

    if ($id !== null) {
      $this->_dirtyFields['id'] = true;
    }
    if ($name !== null) {
      $this->_dirtyFields['name'] = true;
    }
    if ($comment !== null) {
      $this->_dirtyFields['comment'] = true;
    }
    if ($pages !== null) {
      $this->_dirtyFields['pages'] = true;
    }
    if ($flowType !== null) {
      $this->_dirtyFields['flow_type'] = true;
    }
    if ($legalityLevel !== null) {
      $this->_dirtyFields['legality_level'] = true;
    }
    if ($status !== null) {
      $this->_dirtyFields['status'] = true;
    }
    if ($createdAt !== null) {
      $this->_dirtyFields['created_at'] = true;
    }
    if ($updatedAt !== null) {
      $this->_dirtyFields['updated_at'] = true;
    }
    if ($expiresAt !== null) {
      $this->_dirtyFields['expires_at'] = true;
    }
    if ($numRecipients !== null) {
      $this->_dirtyFields['num_recipients'] = true;
    }
    if ($isDuplicable !== null) {
      $this->_dirtyFields['is_duplicable'] = true;
    }
    if ($signingSteps !== null) {
      $this->_dirtyFields['signing_steps'] = true;
    }
    if ($documents !== null) {
      $this->_dirtyFields['documents'] = true;
    }
    if ($notification !== null) {
      $this->_dirtyFields['notification'] = true;
    }
    if ($attachments !== null) {
      $this->_dirtyFields['attachments'] = true;
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
      id: $data['id'] ?? null,
      name: $data['name'] ?? null,
      comment: $data['comment'] ?? null,
      pages: $data['pages'] ?? null,
      flowType: isset($data['flow_type']) &&
      (is_string($data['flow_type']) || is_int($data['flow_type']))
        ? EnvelopeFlowType::tryFrom($data['flow_type'])
        : null,
      legalityLevel: isset($data['legality_level']) &&
      (is_string($data['legality_level']) || is_int($data['legality_level']))
        ? EnvelopeLegalityLevel::tryFrom($data['legality_level'])
        : null,
      status: isset($data['status']) && (is_string($data['status']) || is_int($data['status']))
        ? EnvelopeStatus::tryFrom($data['status'])
        : null,
      createdAt: $data['created_at'] ?? null,
      updatedAt: $data['updated_at'] ?? null,
      expiresAt: $data['expires_at'] ?? null,
      numRecipients: $data['num_recipients'] ?? null,
      isDuplicable: $data['is_duplicable'] ?? null,
      signingSteps: isset($data['signing_steps']) && is_array($data['signing_steps'])
        ? array_map(
          fn($item) => is_array($item) ? SigningStep::fromArray($item) : $item,
          $data['signing_steps']
        )
        : null,
      documents: isset($data['documents']) && is_array($data['documents'])
        ? array_map(
          fn($item) => is_array($item) ? Document::fromArray($item) : $item,
          $data['documents']
        )
        : null,
      notification: isset($data['notification']) && is_array($data['notification'])
        ? EnvelopeNotification::fromArray($data['notification'])
        : null,
      attachments: isset($data['attachments']) && is_array($data['attachments'])
        ? EnvelopeAttachments::fromArray($data['attachments'])
        : null
    );
    $instance->_dirtyFields = [];
    foreach (
      [
        'id',
        'name',
        'comment',
        'pages',
        'flow_type',
        'legality_level',
        'status',
        'created_at',
        'updated_at',
        'expires_at',
        'num_recipients',
        'is_duplicable',
        'signing_steps',
        'documents',
        'notification',
        'attachments'
      ]
      as $field
    ) {
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
    if (array_key_exists('id', $this->_dirtyFields)) {
      $result['id'] = $this->id;
    }
    if (array_key_exists('name', $this->_dirtyFields)) {
      $result['name'] = $this->name;
    }
    if (array_key_exists('comment', $this->_dirtyFields)) {
      $result['comment'] = $this->comment;
    }
    if (array_key_exists('pages', $this->_dirtyFields)) {
      $result['pages'] = $this->pages;
    }
    if (array_key_exists('flow_type', $this->_dirtyFields)) {
      $result['flow_type'] = $this->flowType;
    }
    if (array_key_exists('legality_level', $this->_dirtyFields)) {
      $result['legality_level'] = $this->legalityLevel;
    }
    if (array_key_exists('status', $this->_dirtyFields)) {
      $result['status'] = $this->status;
    }
    if (array_key_exists('created_at', $this->_dirtyFields)) {
      $result['created_at'] = $this->createdAt;
    }
    if (array_key_exists('updated_at', $this->_dirtyFields)) {
      $result['updated_at'] = $this->updatedAt;
    }
    if (array_key_exists('expires_at', $this->_dirtyFields)) {
      $result['expires_at'] = $this->expiresAt;
    }
    if (array_key_exists('num_recipients', $this->_dirtyFields)) {
      $result['num_recipients'] = $this->numRecipients;
    }
    if (array_key_exists('is_duplicable', $this->_dirtyFields)) {
      $result['is_duplicable'] = $this->isDuplicable;
    }
    if (array_key_exists('signing_steps', $this->_dirtyFields)) {
      $result['signing_steps'] = $this->signingSteps;
    }
    if (array_key_exists('documents', $this->_dirtyFields)) {
      $result['documents'] = $this->documents;
    }
    if (array_key_exists('notification', $this->_dirtyFields)) {
      $result['notification'] = $this->notification;
    }
    if (array_key_exists('attachments', $this->_dirtyFields)) {
      $result['attachments'] = $this->attachments;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'id',
        'contents' => $this->id
      ],

      [
        'name' => 'name',
        'contents' => $this->name
      ],

      [
        'name' => 'comment',
        'contents' => $this->comment
      ],

      [
        'name' => 'pages',
        'contents' => (string) $this->pages
      ],

      [
        'name' => 'flowType',
        'contents' => json_encode($this->flowType)
      ],

      [
        'name' => 'legalityLevel',
        'contents' => json_encode($this->legalityLevel)
      ],

      [
        'name' => 'status',
        'contents' => json_encode($this->status)
      ],

      [
        'name' => 'createdAt',
        'contents' => (string) $this->createdAt
      ],

      [
        'name' => 'updatedAt',
        'contents' => (string) $this->updatedAt
      ],

      [
        'name' => 'expiresAt',
        'contents' => (string) $this->expiresAt
      ],

      [
        'name' => 'numRecipients',
        'contents' => (string) $this->numRecipients
      ],

      [
        'name' => 'isDuplicable',
        'contents' => $this->isDuplicable ? 'true' : 'false'
      ],

      [
        'name' => 'signingSteps',
        'contents' => json_encode($this->signingSteps)
      ],

      [
        'name' => 'documents',
        'contents' => json_encode($this->documents)
      ],

      [
        'name' => 'notification',
        'contents' => json_encode($this->notification)
      ],

      [
        'name' => 'attachments',
        'contents' => json_encode($this->attachments)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->signingSteps ?? [] as $item) {
      $item->validate();
    }
    foreach ($this->documents ?? [] as $item) {
      $item->validate();
    }
    $this->notification?->validate();
    $this->attachments?->validate();
  }
}
