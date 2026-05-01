<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddTemplateAnnotationRequest implements \JsonSerializable
{
  #[SerializedName('document_id')]
  public ?string $documentId;

  #[SerializedName('page')]
  public ?float $page;

  #[SerializedName('x')]
  public ?float $x;

  #[SerializedName('y')]
  public ?float $y;

  #[SerializedName('width')]
  public ?float $width;

  #[SerializedName('height')]
  public ?float $height;

  #[SerializedName('type')]
  public ?string $type;

  #[SerializedName('recipient_id')]
  public ?string $recipientId;

  #[SerializedName('required')]
  public ?bool $required;

  #[SerializedName('signature')]
  public ?AddTemplateAnnotationRequestSignature $signature;

  #[SerializedName('initials')]
  public ?AddTemplateAnnotationRequestInitials $initials;

  #[SerializedName('text')]
  public ?AddTemplateAnnotationRequestText $text;

  #[SerializedName('datetime')]
  public ?AddTemplateAnnotationRequestDatetime $datetime;

  #[SerializedName('checkbox')]
  public ?AddTemplateAnnotationRequestCheckbox $checkbox;

  public function __construct(
    ?string $documentId = null,
    ?float $page = null,
    ?float $x = null,
    ?float $y = null,
    ?float $width = null,
    ?float $height = null,
    ?string $type = null,
    ?string $recipientId = null,
    ?bool $required = null,
    ?AddTemplateAnnotationRequestSignature $signature = null,
    ?AddTemplateAnnotationRequestInitials $initials = null,
    ?AddTemplateAnnotationRequestText $text = null,
    ?AddTemplateAnnotationRequestDatetime $datetime = null,
    ?AddTemplateAnnotationRequestCheckbox $checkbox = null
  ) {
    $this->documentId = $documentId;
    $this->page = $page;
    $this->x = $x;
    $this->y = $y;
    $this->width = $width;
    $this->height = $height;
    $this->type = $type;
    $this->recipientId = $recipientId;
    $this->required = $required;
    $this->signature = $signature;
    $this->initials = $initials;
    $this->text = $text;
    $this->datetime = $datetime;
    $this->checkbox = $checkbox;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      documentId: $data['document_id'] ?? null,
      page: $data['page'] ?? null,
      x: $data['x'] ?? null,
      y: $data['y'] ?? null,
      width: $data['width'] ?? null,
      height: $data['height'] ?? null,
      type: $data['type'] ?? null,
      recipientId: $data['recipient_id'] ?? null,
      required: $data['required'] ?? null,
      signature: isset($data['signature']) && is_array($data['signature'])
        ? AddTemplateAnnotationRequestSignature::fromArray($data['signature'])
        : null,
      initials: isset($data['initials']) && is_array($data['initials'])
        ? AddTemplateAnnotationRequestInitials::fromArray($data['initials'])
        : null,
      text: isset($data['text']) && is_array($data['text'])
        ? AddTemplateAnnotationRequestText::fromArray($data['text'])
        : null,
      datetime: isset($data['datetime']) && is_array($data['datetime'])
        ? AddTemplateAnnotationRequestDatetime::fromArray($data['datetime'])
        : null,
      checkbox: isset($data['checkbox']) && is_array($data['checkbox'])
        ? AddTemplateAnnotationRequestCheckbox::fromArray($data['checkbox'])
        : null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'document_id' => $this->documentId,
      'page' => $this->page,
      'x' => $this->x,
      'y' => $this->y,
      'width' => $this->width,
      'height' => $this->height,
      'type' => $this->type,
      'recipient_id' => $this->recipientId,
      'required' => $this->required,
      'signature' => $this->signature,
      'initials' => $this->initials,
      'text' => $this->text,
      'datetime' => $this->datetime,
      'checkbox' => $this->checkbox
    ];

    foreach (
      [
        'document_id',
        'page',
        'x',
        'y',
        'width',
        'height',
        'type',
        'recipient_id',
        'required',
        'signature',
        'initials',
        'text',
        'datetime',
        'checkbox'
      ]
      as $optionalKey
    ) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
