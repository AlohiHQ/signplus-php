<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Document
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

    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $filename = null,
        ?int $pageCount = null,
        ?array $pages = []
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->filename = $filename;
        $this->pageCount = $pageCount;
        $this->pages = $pages;
    }
}
