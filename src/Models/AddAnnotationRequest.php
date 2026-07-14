<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddAnnotationRequest implements \JsonSerializable
{
  /**
   * ID of the recipient
   */
  #[SerializedName('recipient_id')]
  public ?string $recipientId;

  /**
   * ID of the document
   */
  #[SerializedName('document_id')]
  public string $documentId;

  /**
   * Page number where the annotation is placed
   */
  #[SerializedName('page')]
  public int $page;

  /**
   * X coordinate of the annotation (in % of the page width from 0 to 100) from the top left corner
   */
  #[SerializedName('x')]
  public float $x;

  /**
   * Y coordinate of the annotation (in % of the page height from 0 to 100) from the top left corner
   */
  #[SerializedName('y')]
  public float $y;

  /**
   * Width of the annotation (in % of the page width from 0 to 100)
   */
  #[SerializedName('width')]
  public float $width;

  /**
   * Height of the annotation (in % of the page height from 0 to 100)
   */
  #[SerializedName('height')]
  public float $height;

  #[SerializedName('required')]
  public ?bool $required;

  /**
   * Type of the annotation
   */
  #[SerializedName('type')]
  public AnnotationType $type;

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
    string $documentId,
    int $page,
    float $x,
    float $y,
    float $width,
    float $height,
    AnnotationType $type,
    ?string $recipientId = null,
    ?bool $required = null,
    ?AnnotationSignature $signature = null,
    ?AnnotationInitials $initials = null,
    ?AnnotationText $text = null,
    ?AnnotationDateTime $datetime = null,
    ?AnnotationCheckbox $checkbox = null
  ) {
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

    $this->_dirtyFields = [
      'document_id' => true,
      'page' => true,
      'x' => true,
      'y' => true,
      'width' => true,
      'height' => true,
      'type' => true
    ];
    if ($recipientId !== null) {
      $this->_dirtyFields['recipient_id'] = true;
    }
    if ($required !== null) {
      $this->_dirtyFields['required'] = true;
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
      recipientId: $data['recipient_id'] ?? null,
      documentId: $data['document_id'],
      page: $data['page'],
      x: $data['x'],
      y: $data['y'],
      width: $data['width'],
      height: $data['height'],
      required: $data['required'] ?? null,
      type: isset($data['type']) ? AnnotationType::from($data['type']) : null,
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
    if (array_key_exists('recipient_id', $this->_dirtyFields)) {
      $result['recipient_id'] = $this->recipientId;
    }
    $result['document_id'] = $this->documentId;
    $result['page'] = $this->page;
    $result['x'] = $this->x;
    $result['y'] = $this->y;
    $result['width'] = $this->width;
    $result['height'] = $this->height;
    if (array_key_exists('required', $this->_dirtyFields)) {
      $result['required'] = $this->required;
    }
    $result['type'] = $this->type;
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
