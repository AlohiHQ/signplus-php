<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SigningStepsRecipients1 implements \JsonSerializable
{
  #[SerializedName('name')]
  public ?string $name;

  #[SerializedName('email')]
  public ?string $email;

  #[SerializedName('role')]
  public ?string $role;

  #[SerializedName('id')]
  public ?string $id;

  #[SerializedName('uid')]
  public ?string $uid;

  #[SerializedName('verification')]
  public ?Verification $verification;

  public function __construct(
    ?string $name = null,
    ?string $email = null,
    ?string $role = null,
    ?string $id = null,
    ?string $uid = null,
    ?Verification $verification = null
  ) {
    $this->name = $name;
    $this->email = $email;
    $this->role = $role;
    $this->id = $id;
    $this->uid = $uid;
    $this->verification = $verification;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      name: $data['name'] ?? null,
      email: $data['email'] ?? null,
      role: $data['role'] ?? null,
      id: $data['id'] ?? null,
      uid: $data['uid'] ?? null,
      verification: isset($data['verification']) && is_array($data['verification'])
        ? Verification::fromArray($data['verification'])
        : null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'name' => $this->name,
      'email' => $this->email,
      'role' => $this->role,
      'id' => $this->id,
      'uid' => $this->uid,
      'verification' => $this->verification
    ];

    foreach (['name', 'email', 'role', 'id', 'uid', 'verification'] as $optionalKey) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
