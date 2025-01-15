<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetEnvelopeCommentRequest
{
    /**
     * Comment for the envelope
     */
    #[SerializedName('comment')]
    public string $comment;

    public function __construct(string $comment)
    {
        $this->comment = $comment;
    }
}
