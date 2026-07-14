<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Annotation implements \JsonSerializable
{
  /**
   * Unique identifier of the annotation
   */
  #[SerializedName('id')]
  public ?string $id;

  /**
   * ID of the recipient
   */
  #[SerializedName('recipient_id')]
  public ?string $recipientId;

  /**
   * ID of the document
   */
  #[SerializedName('document_id')]
  public ?string $documentId;

  /**
   * Page number where the annotation is placed
   */
  #[SerializedName('page')]
  public ?int $page;

  /**
   * X coordinate of the annotation (in % of the page width from 0 to 100) from the top left corner
   */
  #[SerializedName('x')]
  public ?float $x;

  /**
   * Y coordinate of the annotation (in % of the page height from 0 to 100) from the top left corner
   */
  #[SerializedName('y')]
  public ?float $y;

  /**
   * Width of the annotation (in % of the page width from 0 to 100)
   */
  #[SerializedName('width')]
  public ?float $width;

  /**
   * Height of the annotation (in % of the page height from 0 to 100)
   */
  #[SerializedName('height')]
  public ?float $height;

  /**
   * Whether the annotation is required
   */
  #[SerializedName('required')]
  public ?bool $required;

  /**
   * Type of the annotation
   */
  #[SerializedName('type')]
  public ?AnnotationType $type;

  /**
   * Signature annotation (null if annotation is not a signature)
   */
  #[SerializedName('signature')]
  public ?AnnotationSignature $signature;

  /**
   * Initials annotation (null if annotation is not initials)
   */
  #[SerializedName('initials')]
  public ?AnnotationInitials $initials;

  /**
   * Text annotation (null if annotation is not a text)
   */
  #[SerializedName('text')]
  public ?AnnotationText $text;

  /**
   * Date annotation (null if annotation is not a date)
   */
  #[SerializedName('datetime')]
  public ?AnnotationDateTime $datetime;

  /**
   * Checkbox annotation (null if annotation is not a checkbox)
   */
  #[SerializedName('checkbox')]
  public ?AnnotationCheckbox $checkbox;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?string $id = null,
    ?string $recipientId = null,
    ?string $documentId = null,
    ?int $page = null,
    ?float $x = null,
    ?float $y = null,
    ?float $width = null,
    ?float $height = null,
    ?bool $required = null,
    ?AnnotationType $type = null,
    ?AnnotationSignature $signature = null,
    ?AnnotationInitials $initials = null,
    ?AnnotationText $text = null,
    ?AnnotationDateTime $datetime = null,
    ?AnnotationCheckbox $checkbox = null
  ) {
    $this->id = $id;
    $this->recipientId = $recipientId;
    $this->documentId = $documentId;
    $this->page = $page;
    $this->x = $x;
    $this->y = $y;
    $this->width = $width;
    $this->height = $height;
    $this->required = $required;
    $this->type = $type;
    $this->signature = $signature;
    $this->initials = $initials;
    $this->text = $text;
    $this->datetime = $datetime;
    $this->checkbox = $checkbox;

    if ($id !== null) {
      $this->_dirtyFields['id'] = true;
    }
    if ($recipientId !== null) {
      $this->_dirtyFields['recipient_id'] = true;
    }
    if ($documentId !== null) {
      $this->_dirtyFields['document_id'] = true;
    }
    if ($page !== null) {
      $this->_dirtyFields['page'] = true;
    }
    if ($x !== null) {
      $this->_dirtyFields['x'] = true;
    }
    if ($y !== null) {
      $this->_dirtyFields['y'] = true;
    }
    if ($width !== null) {
      $this->_dirtyFields['width'] = true;
    }
    if ($height !== null) {
      $this->_dirtyFields['height'] = true;
    }
    if ($required !== null) {
      $this->_dirtyFields['required'] = true;
    }
    if ($type !== null) {
      $this->_dirtyFields['type'] = true;
    }
    if ($signature !== null) {
      $this->_dirtyFields['signature'] = true;
    }
    if ($initials !== null) {
      $this->_dirtyFields['initials'] = true;
    }
    if ($text !== null) {
      $this->_dirtyFields['text'] = true;
    }
    if ($datetime !== null) {
      $this->_dirtyFields['datetime'] = true;
    }
    if ($checkbox !== null) {
      $this->_dirtyFields['checkbox'] = true;
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
      recipientId: $data['recipient_id'] ?? null,
      documentId: $data['document_id'] ?? null,
      page: $data['page'] ?? null,
      x: $data['x'] ?? null,
      y: $data['y'] ?? null,
      width: $data['width'] ?? null,
      height: $data['height'] ?? null,
      required: $data['required'] ?? null,
      type: isset($data['type']) && (is_string($data['type']) || is_int($data['type']))
        ? AnnotationType::tryFrom($data['type'])
        : null,
      signature: isset($data['signature']) && is_array($data['signature'])
        ? AnnotationSignature::fromArray($data['signature'])
        : null,
      initials: isset($data['initials']) && is_array($data['initials'])
        ? AnnotationInitials::fromArray($data['initials'])
        : null,
      text: isset($data['text']) && is_array($data['text'])
        ? AnnotationText::fromArray($data['text'])
        : null,
      datetime: isset($data['datetime']) && is_array($data['datetime'])
        ? AnnotationDateTime::fromArray($data['datetime'])
        : null,
      checkbox: isset($data['checkbox']) && is_array($data['checkbox'])
        ? AnnotationCheckbox::fromArray($data['checkbox'])
        : null
    );
    $instance->_dirtyFields = [];
    foreach (
      [
        'id',
        'recipient_id',
        'document_id',
        'page',
        'x',
        'y',
        'width',
        'height',
        'required',
        'type',
        'signature',
        'initials',
        'text',
        'datetime',
        'checkbox'
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
    if (array_key_exists('recipient_id', $this->_dirtyFields)) {
      $result['recipient_id'] = $this->recipientId;
    }
    if (array_key_exists('document_id', $this->_dirtyFields)) {
      $result['document_id'] = $this->documentId;
    }
    if (array_key_exists('page', $this->_dirtyFields)) {
      $result['page'] = $this->page;
    }
    if (array_key_exists('x', $this->_dirtyFields)) {
      $result['x'] = $this->x;
    }
    if (array_key_exists('y', $this->_dirtyFields)) {
      $result['y'] = $this->y;
    }
    if (array_key_exists('width', $this->_dirtyFields)) {
      $result['width'] = $this->width;
    }
    if (array_key_exists('height', $this->_dirtyFields)) {
      $result['height'] = $this->height;
    }
    if (array_key_exists('required', $this->_dirtyFields)) {
      $result['required'] = $this->required;
    }
    if (array_key_exists('type', $this->_dirtyFields)) {
      $result['type'] = $this->type;
    }
    if (array_key_exists('signature', $this->_dirtyFields)) {
      $result['signature'] = $this->signature;
    }
    if (array_key_exists('initials', $this->_dirtyFields)) {
      $result['initials'] = $this->initials;
    }
    if (array_key_exists('text', $this->_dirtyFields)) {
      $result['text'] = $this->text;
    }
    if (array_key_exists('datetime', $this->_dirtyFields)) {
      $result['datetime'] = $this->datetime;
    }
    if (array_key_exists('checkbox', $this->_dirtyFields)) {
      $result['checkbox'] = $this->checkbox;
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
        'name' => 'recipientId',
        'contents' => $this->recipientId
      ],

      [
        'name' => 'documentId',
        'contents' => $this->documentId
      ],

      [
        'name' => 'page',
        'contents' => (string) $this->page
      ],

      [
        'name' => 'x',
        'contents' => (string) $this->x
      ],

      [
        'name' => 'y',
        'contents' => (string) $this->y
      ],

      [
        'name' => 'width',
        'contents' => (string) $this->width
      ],

      [
        'name' => 'height',
        'contents' => (string) $this->height
      ],

      [
        'name' => 'required',
        'contents' => $this->required ? 'true' : 'false'
      ],

      [
        'name' => 'type',
        'contents' => json_encode($this->type)
      ],

      [
        'name' => 'signature',
        'contents' => json_encode($this->signature)
      ],

      [
        'name' => 'initials',
        'contents' => json_encode($this->initials)
      ],

      [
        'name' => 'text',
        'contents' => json_encode($this->text)
      ],

      [
        'name' => 'datetime',
        'contents' => json_encode($this->datetime)
      ],

      [
        'name' => 'checkbox',
        'contents' => json_encode($this->checkbox)
      ]
    ];
  }

  public function validate(): void
  {
    $this->signature?->validate();
    $this->initials?->validate();
    $this->text?->validate();
    $this->datetime?->validate();
    $this->checkbox?->validate();
  }
}
