<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListEnvelopesRequest implements \JsonSerializable
{
  #[SerializedName('name')]
  public ?string $name;

  /**
   * @var string[]|null
   */
  #[SerializedName('tags')]
  public ?array $tags;

  #[SerializedName('comment')]
  public ?string $comment;

  /**
   * @var string[]|null
   */
  #[SerializedName('ids')]
  public ?array $ids;

  /**
   * @var string[]|null
   */
  #[SerializedName('statuses')]
  public ?array $statuses;

  /**
   * @var string[]|null
   */
  #[SerializedName('folder_ids')]
  public ?array $folderIds;

  #[SerializedName('only_root_folder')]
  public ?string $onlyRootFolder;

  #[SerializedName('date_from')]
  public ?string $dateFrom;

  #[SerializedName('date_to')]
  public ?string $dateTo;

  #[SerializedName('uid')]
  public ?string $uid;

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

  #[SerializedName('include_trash')]
  public ?string $includeTrash;

  public function __construct(
    ?string $name = null,
    ?array $tags = [],
    ?string $comment = null,
    ?array $ids = [],
    ?array $statuses = [],
    ?array $folderIds = [],
    ?string $onlyRootFolder = null,
    ?string $dateFrom = null,
    ?string $dateTo = null,
    ?string $uid = null,
    ?string $first = null,
    ?string $last = null,
    ?string $after = null,
    ?string $before = null,
    ?string $orderField = null,
    ?string $ascending = null,
    ?string $includeTrash = null
  ) {
    $this->name = $name;
    $this->tags = $tags;
    $this->comment = $comment;
    $this->ids = $ids;
    $this->statuses = $statuses;
    $this->folderIds = $folderIds;
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
      comment: $data['comment'] ?? null,
      ids: $data['ids'] ?? null,
      statuses: $data['statuses'] ?? null,
      folderIds: $data['folder_ids'] ?? null,
      onlyRootFolder: $data['only_root_folder'] ?? null,
      dateFrom: $data['date_from'] ?? null,
      dateTo: $data['date_to'] ?? null,
      uid: $data['uid'] ?? null,
      first: $data['first'] ?? null,
      last: $data['last'] ?? null,
      after: $data['after'] ?? null,
      before: $data['before'] ?? null,
      orderField: $data['order_field'] ?? null,
      ascending: $data['ascending'] ?? null,
      includeTrash: $data['include_trash'] ?? null
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
      'comment' => $this->comment,
      'ids' => $this->ids,
      'statuses' => $this->statuses,
      'folder_ids' => $this->folderIds,
      'only_root_folder' => $this->onlyRootFolder,
      'date_from' => $this->dateFrom,
      'date_to' => $this->dateTo,
      'uid' => $this->uid,
      'first' => $this->first,
      'last' => $this->last,
      'after' => $this->after,
      'before' => $this->before,
      'order_field' => $this->orderField,
      'ascending' => $this->ascending,
      'include_trash' => $this->includeTrash
    ];

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
      as $optionalKey
    ) {
      if ($result[$optionalKey] === null) {
        unset($result[$optionalKey]);
      }
    }

    return $result;
  }
}
