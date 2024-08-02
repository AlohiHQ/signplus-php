<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListTemplatesRequest
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

    public function __construct(
        ?string $name = null,
        ?array $tags = [],
        ?array $ids = [],
        ?int $first = null,
        ?int $last = null,
        ?string $after = null,
        ?string $before = null,
        ?TemplateOrderField $orderField = null,
        ?bool $ascending = null
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
}
