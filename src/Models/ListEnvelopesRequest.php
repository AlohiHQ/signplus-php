<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListEnvelopesRequest implements \JsonSerializable
{
  /**
   * Name of the envelope
   */
  #[SerializedName('name')]
  public ?string $name;

  /**
   * @var string[]|null
   * List of tags
   */
  #[SerializedName('tags')]
  public ?array $tags;

  /**
   * Comment of the envelope
   */
  #[SerializedName('comment')]
  public ?string $comment;

  /**
   * @var string[]|null
   * List of envelope IDs
   */
  #[SerializedName('ids')]
  public ?array $ids;

  /**
   * @var EnvelopeStatus[]|null
   * List of envelope statuses
   */
  #[SerializedName('statuses')]
  public ?array $statuses;

  /**
   * @var string[]|null
   * List of folder IDs
   */
  #[SerializedName('folder_ids')]
  public ?array $folderIds;

  /**
   * Whether to only list envelopes in the root folder
   */
  #[SerializedName('only_root_folder')]
  public ?bool $onlyRootFolder;

  /**
   * Unix timestamp of the start date
   */
  #[SerializedName('date_from')]
  public ?int $dateFrom;

  /**
   * Unix timestamp of the end date
   */
  #[SerializedName('date_to')]
  public ?int $dateTo;

  /**
   * Unique identifier of the user
   */
  #[SerializedName('uid')]
  public ?string $uid;

  #[SerializedName('first')]
  public ?int $first;

  #[SerializedName('last')]
  public ?int $last;

  #[SerializedName('after')]
  public ?string $after;

  #[SerializedName('before')]
  public ?string $before;

  /**
   * Field to order envelopes by
   */
  #[SerializedName('order_field')]
  public ?EnvelopeOrderField $orderField;

  /**
   * Whether to order envelopes in ascending order
   */
  #[SerializedName('ascending')]
  public ?bool $ascending;

  /**
   * Whether to include envelopes in the trash
   */
  #[SerializedName('include_trash')]
  public ?bool $includeTrash;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?string $name = null,
    ?array $tags = null,
    ?string $comment = null,
    ?array $ids = null,
    ?array $statuses = null,
    ?array $folderIds = null,
    ?bool $onlyRootFolder = null,
    ?int $dateFrom = null,
    ?int $dateTo = null,
    ?string $uid = null,
    ?int $first = null,
    ?int $last = null,
    ?string $after = null,
    ?string $before = null,
    ?EnvelopeOrderField $orderField = null,
    ?bool $ascending = null,
    ?bool $includeTrash = null
  ) {
    $this->name = $name;
    $this->tags = $tags ?? [];
    $this->comment = $comment;
    $this->ids = $ids ?? [];
    $this->statuses = $statuses ?? [];
    $this->folderIds = $folderIds ?? [];
    $this->onlyRootFolder = $onlyRootFolder;
    $this->dateFrom = $dateFrom;
    $this->dateTo = $dateTo;
    $this->uid = $uid;
    $this->first = $first;
    $this->last = $last;
    $this->after = $after;
    $this->before = $before;
    $this->orderField = $orderField;
    $this->ascending = $ascending;
    $this->includeTrash = $includeTrash;

    if ($name !== null) {
      $this->_dirtyFields['name'] = true;
    }
    if ($tags !== null) {
      $this->_dirtyFields['tags'] = true;
    }
    if ($comment !== null) {
      $this->_dirtyFields['comment'] = true;
    }
    if ($ids !== null) {
      $this->_dirtyFields['ids'] = true;
    }
    if ($statuses !== null) {
      $this->_dirtyFields['statuses'] = true;
    }
    if ($folderIds !== null) {
      $this->_dirtyFields['folder_ids'] = true;
    }
    if ($onlyRootFolder !== null) {
      $this->_dirtyFields['only_root_folder'] = true;
    }
    if ($dateFrom !== null) {
      $this->_dirtyFields['date_from'] = true;
    }
    if ($dateTo !== null) {
      $this->_dirtyFields['date_to'] = true;
    }
    if ($uid !== null) {
      $this->_dirtyFields['uid'] = true;
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
    if ($includeTrash !== null) {
      $this->_dirtyFields['include_trash'] = true;
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
      comment: $data['comment'] ?? null,
      ids: $data['ids'] ?? null,
      statuses: isset($data['statuses']) && is_array($data['statuses'])
        ? array_map(
          fn($item) => is_array($item) ? EnvelopeStatus::fromArray($item) : $item,
          $data['statuses']
        )
        : null,
      folderIds: $data['folder_ids'] ?? null,
      onlyRootFolder: $data['only_root_folder'] ?? null,
      dateFrom: $data['date_from'] ?? null,
      dateTo: $data['date_to'] ?? null,
      uid: $data['uid'] ?? null,
      first: $data['first'] ?? null,
      last: $data['last'] ?? null,
      after: $data['after'] ?? null,
      before: $data['before'] ?? null,
      orderField: isset($data['order_field']) &&
      (is_string($data['order_field']) || is_int($data['order_field']))
        ? EnvelopeOrderField::tryFrom($data['order_field'])
        : null,
      ascending: $data['ascending'] ?? null,
      includeTrash: $data['include_trash'] ?? null
    );
    $instance->_dirtyFields = [];
    foreach (
      [
        'name',
        'tags',
        'comment',
        'ids',
        'statuses',
        'folder_ids',
        'only_root_folder',
        'date_from',
        'date_to',
        'uid',
        'first',
        'last',
        'after',
        'before',
        'order_field',
        'ascending',
        'include_trash'
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
    if (array_key_exists('name', $this->_dirtyFields)) {
      $result['name'] = $this->name;
    }
    if (array_key_exists('tags', $this->_dirtyFields)) {
      $result['tags'] = $this->tags;
    }
    if (array_key_exists('comment', $this->_dirtyFields)) {
      $result['comment'] = $this->comment;
    }
    if (array_key_exists('ids', $this->_dirtyFields)) {
      $result['ids'] = $this->ids;
    }
    if (array_key_exists('statuses', $this->_dirtyFields)) {
      $result['statuses'] = $this->statuses;
    }
    if (array_key_exists('folder_ids', $this->_dirtyFields)) {
      $result['folder_ids'] = $this->folderIds;
    }
    if (array_key_exists('only_root_folder', $this->_dirtyFields)) {
      $result['only_root_folder'] = $this->onlyRootFolder;
    }
    if (array_key_exists('date_from', $this->_dirtyFields)) {
      $result['date_from'] = $this->dateFrom;
    }
    if (array_key_exists('date_to', $this->_dirtyFields)) {
      $result['date_to'] = $this->dateTo;
    }
    if (array_key_exists('uid', $this->_dirtyFields)) {
      $result['uid'] = $this->uid;
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
    if (array_key_exists('include_trash', $this->_dirtyFields)) {
      $result['include_trash'] = $this->includeTrash;
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
        'name' => 'comment',
        'contents' => $this->comment
      ],

      [
        'name' => 'ids',
        'contents' => json_encode($this->ids)
      ],

      [
        'name' => 'statuses',
        'contents' => json_encode($this->statuses)
      ],

      [
        'name' => 'folderIds',
        'contents' => json_encode($this->folderIds)
      ],

      [
        'name' => 'onlyRootFolder',
        'contents' => $this->onlyRootFolder ? 'true' : 'false'
      ],

      [
        'name' => 'dateFrom',
        'contents' => (string) $this->dateFrom
      ],

      [
        'name' => 'dateTo',
        'contents' => (string) $this->dateTo
      ],

      [
        'name' => 'uid',
        'contents' => $this->uid
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
      ],

      [
        'name' => 'includeTrash',
        'contents' => $this->includeTrash ? 'true' : 'false'
      ]
    ];
  }

  public function validate(): void
  {
  }
}
