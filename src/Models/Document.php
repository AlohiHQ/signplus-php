<?php

declare(strict_types=1);

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Document implements \JsonSerializable
{
  /**
   * Unique identifier of the document
   */
  #[SerializedName('id')]
  public ?string $id;

  /**
   * Name of the document
   */
  #[SerializedName('name')]
  public ?string $name;

  /**
   * Filename of the document
   */
  #[SerializedName('filename')]
  public ?string $filename;

  /**
   * Number of pages in the document
   */
  #[SerializedName('page_count')]
  public ?int $pageCount;

  /**
   * @var Page[]|null
   * List of pages in the document
   */
  #[SerializedName('pages')]
  public ?array $pages;

  /** @var array<string, true> Tracks which fields were explicitly set */
  private array $_dirtyFields = [];

  public function __construct(
    ?string $id = null,
    ?string $name = null,
    ?string $filename = null,
    ?int $pageCount = null,
    ?array $pages = null
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->filename = $filename;
    $this->pageCount = $pageCount;
    $this->pages = $pages ?? [];

    if ($id !== null) {
      $this->_dirtyFields['id'] = true;
    }
    if ($name !== null) {
      $this->_dirtyFields['name'] = true;
    }
    if ($filename !== null) {
      $this->_dirtyFields['filename'] = true;
    }
    if ($pageCount !== null) {
      $this->_dirtyFields['page_count'] = true;
    }
    if ($pages !== null) {
      $this->_dirtyFields['pages'] = true;
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
      name: $data['name'] ?? null,
      filename: $data['filename'] ?? null,
      pageCount: $data['page_count'] ?? null,
      pages: isset($data['pages']) && is_array($data['pages'])
        ? array_map(fn($item) => is_array($item) ? Page::fromArray($item) : $item, $data['pages'])
        : null
    );
    $instance->_dirtyFields = [];
    foreach (['id', 'name', 'filename', 'page_count', 'pages'] as $field) {
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
    if (array_key_exists('name', $this->_dirtyFields)) {
      $result['name'] = $this->name;
    }
    if (array_key_exists('filename', $this->_dirtyFields)) {
      $result['filename'] = $this->filename;
    }
    if (array_key_exists('page_count', $this->_dirtyFields)) {
      $result['page_count'] = $this->pageCount;
    }
    if (array_key_exists('pages', $this->_dirtyFields)) {
      $result['pages'] = $this->pages;
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
        'name' => 'name',
        'contents' => $this->name
      ],

      [
        'name' => 'filename',
        'contents' => $this->filename
      ],

      [
        'name' => 'pageCount',
        'contents' => (string) $this->pageCount
      ],

      [
        'name' => 'pages',
        'contents' => json_encode($this->pages)
      ]
    ];
  }

  public function validate(): void
  {
    foreach ($this->pages ?? [] as $item) {
      $item->validate();
    }
  }
}
