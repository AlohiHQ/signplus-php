<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class SetTemplateCommentRequest
{
    /**
     * Comment for the template
     */
    #[SerializedName('comment')]
    public ?string $comment;

    public function __construct(?string $comment = null)
    {
        $this->comment = $comment;
    }
}
