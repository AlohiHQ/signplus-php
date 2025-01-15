<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListEnvelopesRequest
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

    public function __construct(
        ?string $name = null,
        ?array $tags = [],
        ?string $comment = null,
        ?array $ids = [],
        ?array $statuses = [],
        ?array $folderIds = [],
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
}
