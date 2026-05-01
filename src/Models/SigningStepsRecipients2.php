<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SigningStepsRecipients2 implements \JsonSerializable
{
  #[SerializedName('id')]
  public ?string $id;

  #[SerializedName('uid')]
  public ?string $uid;

  #[SerializedName('name')]
  public ?string $name;

  #[SerializedName('email')]
  public ?string $email;

  #[SerializedName('role')]
  public ?string $role;

  public function __construct(
    ?string $id = null,
    ?string $uid = null,
    ?string $name = null,
    ?string $email = null,
    ?string $role = null
  ) {
    $this->id = $id;
    $this->uid = $uid;
    $this->name = $name;
    $this->email = $email;
    $this->role = $role;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      id: $data['id'] ?? null,
      uid: $data['uid'] ?? null,
      name: $data['name'] ?? null,
      email: $data['email'] ?? null,
      role: $data['role'] ?? null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'id' => $this->id,
      'uid' => $this->uid,
      'name' => $this->name,
      'email' => $this->email,
      'role' => $this->role
    ];

    foreach (['id', 'uid', 'name', 'email', 'role'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
