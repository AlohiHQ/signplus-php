<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class TemplateRecipient implements \JsonSerializable
{
  /**
   * Unique identifier of the recipient
   */
  #[SerializedName('id')]
  public ?string $id;

  /**
   * Unique identifier of the user associated with the recipient
   */
  #[SerializedName('uid')]
  public ?string $uid;

  /**
   * Name of the recipient
   */
  #[SerializedName('name')]
  public ?string $name;

  /**
   * Email of the recipient
   */
  #[SerializedName('email')]
  public ?string $email;

  /**
   * Role of the recipient (SIGNER signs the document, RECEIVES_COPY receives a copy of the document, IN_PERSON_SIGNER signs the document in person, SENDER sends the document)
   */
  #[SerializedName('role')]
  public ?TemplateRecipientRole $role;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?string $id = null,
    ?string $uid = null,
    ?string $name = null,
    ?string $email = null,
    ?TemplateRecipientRole $role = null
  ) {
    $this->id = $id;
    $this->uid = $uid;
    $this->name = $name;
    $this->email = $email;
    $this->role = $role;

    if ($id !== null) {
      $this->_dirtyFields['id'] = true;
    }
    if ($uid !== null) {
      $this->_dirtyFields['uid'] = true;
    }
    if ($name !== null) {
      $this->_dirtyFields['name'] = true;
    }
    if ($email !== null) {
      $this->_dirtyFields['email'] = true;
    }
    if ($role !== null) {
      $this->_dirtyFields['role'] = true;
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
      uid: $data['uid'] ?? null,
      name: $data['name'] ?? null,
      email: $data['email'] ?? null,
      role: isset($data['role']) && (is_string($data['role']) || is_int($data['role']))
        ? TemplateRecipientRole::tryFrom($data['role'])
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['id', 'uid', 'name', 'email', 'role'] as $field) {
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
    if (array_key_exists('uid', $this->_dirtyFields)) {
      $result['uid'] = $this->uid;
    }
    if (array_key_exists('name', $this->_dirtyFields)) {
      $result['name'] = $this->name;
    }
    if (array_key_exists('email', $this->_dirtyFields)) {
      $result['email'] = $this->email;
    }
    if (array_key_exists('role', $this->_dirtyFields)) {
      $result['role'] = $this->role;
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
        'name' => 'uid',
        'contents' => $this->uid
      ],

      [
        'name' => 'name',
        'contents' => $this->name
      ],

      [
        'name' => 'email',
        'contents' => $this->email
      ],

      [
        'name' => 'role',
        'contents' => json_encode($this->role)
      ]
    ];
  }

  public function validate(): void
  {
  }
}
