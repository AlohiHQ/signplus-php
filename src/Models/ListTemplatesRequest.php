<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListTemplatesRequest implements \JsonSerializable
{
  /**
   * Name of the template
   */
  #[SerializedName('name')]
  public ?string $name;

  /**
   * @var string[]|null
   * List of tag templates
   */
  #[SerializedName('tags')]
  public ?array $tags;

  /**
   * @var string[]|null
   * List of templates IDs
   */
  #[SerializedName('ids')]
  public ?array $ids;

  #[SerializedName('first')]
  public ?int $first;

  #[SerializedName('last')]
  public ?int $last;

  #[SerializedName('after')]
  public ?string $after;

  #[SerializedName('before')]
  public ?string $before;

  /**
   * Field to order templates by
   */
  #[SerializedName('order_field')]
  public ?TemplateOrderField $orderField;

  /**
   * Whether to order templates in ascending order
   */
  #[SerializedName('ascending')]
  public ?bool $ascending;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?string $name = null,
    ?array $tags = null,
    ?array $ids = null,
    ?int $first = null,
    ?int $last = null,
    ?string $after = null,
    ?string $before = null,
    ?TemplateOrderField $orderField = null,
    ?bool $ascending = null
  ) {
    $this->name = $name;
    $this->tags = $tags ?? [];
    $this->ids = $ids ?? [];
    $this->first = $first;
    $this->last = $last;
    $this->after = $after;
    $this->before = $before;
    $this->orderField = $orderField;
    $this->ascending = $ascending;

    if ($name !== null) {
      $this->_dirtyFields['name'] = true;
    }
    if ($tags !== null) {
      $this->_dirtyFields['tags'] = true;
    }
    if ($ids !== null) {
      $this->_dirtyFields['ids'] = true;
    }
    if ($first !== null) {
      $this->_dirtyFields['first'] = true;
    }
    if ($last !== null) {
      $this->_dirtyFields['last'] = true;
    }
    if ($after !== null) {
      $this->_dirtyFields['after'] = true;
    }
    if ($before !== null) {
      $this->_dirtyFields['before'] = true;
    }
    if ($orderField !== null) {
      $this->_dirtyFields['order_field'] = true;
    }
    if ($ascending !== null) {
      $this->_dirtyFields['ascending'] = true;
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
      name: $data['name'] ?? null,
      tags: $data['tags'] ?? null,
      ids: $data['ids'] ?? null,
      first: $data['first'] ?? null,
      last: $data['last'] ?? null,
      after: $data['after'] ?? null,
      before: $data['before'] ?? null,
      orderField: isset($data['order_field']) &&
      (is_string($data['order_field']) || is_int($data['order_field']))
        ? TemplateOrderField::tryFrom($data['order_field'])
        : null,
      ascending: $data['ascending'] ?? null
    );
    $instance->_dirtyFields = [];
    foreach (
      ['name', 'tags', 'ids', 'first', 'last', 'after', 'before', 'order_field', 'ascending']
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
    if (array_key_exists('name', $this->_dirtyFields)) {
      $result['name'] = $this->name;
    }
    if (array_key_exists('tags', $this->_dirtyFields)) {
      $result['tags'] = $this->tags;
    }
    if (array_key_exists('ids', $this->_dirtyFields)) {
      $result['ids'] = $this->ids;
    }
    if (array_key_exists('first', $this->_dirtyFields)) {
      $result['first'] = $this->first;
    }
    if (array_key_exists('last', $this->_dirtyFields)) {
      $result['last'] = $this->last;
    }
    if (array_key_exists('after', $this->_dirtyFields)) {
      $result['after'] = $this->after;
    }
    if (array_key_exists('before', $this->_dirtyFields)) {
      $result['before'] = $this->before;
    }
    if (array_key_exists('order_field', $this->_dirtyFields)) {
      $result['order_field'] = $this->orderField;
    }
    if (array_key_exists('ascending', $this->_dirtyFields)) {
      $result['ascending'] = $this->ascending;
    }
    return $result;
  }

  public function toMultipart(): array
  {
    return [
      [
        'name' => 'name',
        'contents' => $this->name
      ],

      [
        'name' => 'tags',
        'contents' => json_encode($this->tags)
      ],

      [
        'name' => 'ids',
        'contents' => json_encode($this->ids)
      ],

      [
        'name' => 'first',
        'contents' => (string) $this->first
      ],

      [
        'name' => 'last',
        'contents' => (string) $this->last
      ],

      [
        'name' => 'after',
        'contents' => $this->after
      ],

      [
        'name' => 'before',
        'contents' => $this->before
      ],

      [
        'name' => 'orderField',
        'contents' => json_encode($this->orderField)
      ],

      [
        'name' => 'ascending',
        'contents' => $this->ascending ? 'true' : 'false'
      ]
    ];
  }

  public function validate(): void
  {
  }
}
