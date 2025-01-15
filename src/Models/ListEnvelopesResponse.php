<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class ListEnvelopesResponse
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
     * @var Envelope[]|null
     */
    #[SerializedName('envelopes')]
    public ?array $envelopes;

    public function __construct(?bool $hasNextPage = null, ?bool $hasPreviousPage = null, ?array $envelopes = [])
    {
        $this->hasNextPage = $hasNextPage;
        $this->hasPreviousPage = $hasPreviousPage;
        $this->envelopes = $envelopes;
    }
}
