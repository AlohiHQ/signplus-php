<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListTemplatesResponse
{
    /**
     * Whether there is a next page
     */
    #[SerializedName('has_next_page')]
    public ?bool $hasNextPage;

    /**
     * Whether there is a previous page
     */
    #[SerializedName('has_previous_page')]
    public ?bool $hasPreviousPage;

    /**
     * @var Template[]|null
     */
    #[SerializedName('templates')]
    public ?array $templates;

    public function __construct(?bool $hasNextPage = null, ?bool $hasPreviousPage = null, ?array $templates = [])
    {
        $this->hasNextPage = $hasNextPage;
        $this->hasPreviousPage = $hasPreviousPage;
        $this->templates = $templates;
    }
}
