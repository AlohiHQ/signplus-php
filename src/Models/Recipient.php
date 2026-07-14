<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Recipient implements \JsonSerializable
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
  public string $name;

  /**
   * Email of the recipient
   */
  #[SerializedName('email')]
  public string $email;

  /**
   * Role of the recipient (SIGNER signs the document, RECEIVES_COPY receives a copy of the document, IN_PERSON_SIGNER signs the document in person, SENDER sends the document)
   */
  #[SerializedName('role')]
  public RecipientRole $role;

  #[SerializedName('verification')]
  public ?RecipientVerification $verification;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    string $name,
    string $email,
    RecipientRole $role,
    ?string $id = null,
    ?string $uid = null,
    ?RecipientVerification $verification = null
  ) {
    $this->id = $id;
    $this->uid = $uid;
    $this->name = $name;
    $this->email = $email;
    $this->role = $role;
    $this->verification = $verification;

    $this->_dirtyFields = [
      'name' => true,
      'email' => true,
      'role' => true
    ];
    if ($id !== null) {
      $this->_dirtyFields['id'] = true;
    }
    if ($uid !== null) {
      $this->_dirtyFields['uid'] = true;
    }
    if ($verification !== null) {
      $this->_dirtyFields['verification'] = true;
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
      name: $data['name'],
      email: $data['email'],
      role: isset($data['role']) ? RecipientRole::from($data['role']) : null,
      verification: isset($data['verification']) && is_array($data['verification'])
        ? RecipientVerification::fromArray($data['verification'])
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['id', 'uid', 'name', 'email', 'role', 'verification'] as $field) {
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
    $result['name'] = $this->name;
    $result['email'] = $this->email;
    $result['role'] = $this->role;
    if (array_key_exists('verification', $this->_dirtyFields)) {
      $result['verification'] = $this->verification;
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
      ],

      [
        'name' => 'verification',
        'contents' => json_encode($this->verification)
      ]
    ];
  }

  public function validate(): void
  {
    $this->verification?->validate();
  }
}
