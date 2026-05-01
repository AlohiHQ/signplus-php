<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListTemplatesRequest implements \JsonSerializable
{
  #[SerializedName('name')]
  public ?string $name;

  /**
   * @var string[]|null
   */
  #[SerializedName('tags')]
  public ?array $tags;

  /**
   * @var string[]|null
   */
  #[SerializedName('ids')]
  public ?array $ids;

  #[SerializedName('first')]
  public ?string $first;

  #[SerializedName('last')]
  public ?string $last;

  #[SerializedName('after')]
  public ?string $after;

  #[SerializedName('before')]
  public ?string $before;

  #[SerializedName('order_field')]
  public ?string $orderField;

  #[SerializedName('ascending')]
  public ?string $ascending;

  public function __construct(
    ?string $name = null,
    ?array $tags = [],
    ?array $ids = [],
    ?string $first = null,
    ?string $last = null,
    ?string $after = null,
    ?string $before = null,
    ?string $orderField = null,
    ?string $ascending = null
  ) {
    $this->name = $name;
    $this->tags = $tags;
    $this->ids = $ids;
    $this->first = $first;
    $this->last = $last;
    $this->after = $after;
    $this->before = $before;
    $this->orderField = $orderField;
    $this->ascending = $ascending;
  }

  /**
   * @param array<string, mixed> $data
   * @return self
   */
  public static function fromArray(array $data): self
  {
    return new self(
      name: $data['name'] ?? null,
      tags: $data['tags'] ?? null,
      ids: $data['ids'] ?? null,
      first: $data['first'] ?? null,
      last: $data['last'] ?? null,
      after: $data['after'] ?? null,
      before: $data['before'] ?? null,
      orderField: $data['order_field'] ?? null,
      ascending: $data['ascending'] ?? null
    );
  }

  /**
   * @return array<string, mixed>
   */
  public function jsonSerialize(): array
  {
    $result = [
      'name' => $this->name,
      'tags' => $this->tags,
      'ids' => $this->ids,
      'first' => $this->first,
      'last' => $this->last,
      'after' => $this->after,
      'before' => $this->before,
      'order_field' => $this->orderField,
      'ascending' => $this->ascending
    ];

    foreach (
      ['name', 'tags', 'ids', 'first', 'last', 'after', 'before', 'order_field', 'ascending']
      as $optionalKey
    ) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
