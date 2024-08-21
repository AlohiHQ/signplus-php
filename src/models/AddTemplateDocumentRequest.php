<?php

namespace Signplus\Models;

use Symfony\Component\Serializer\Annotation\SerializedName;

class AddTemplateDocumentRequest
{
    /**
     * @var resource*/
    #[SerializedName('file')]
    public mixed $file;

    public function __construct(mixed $file)
    {
        $this->file = $file;
    }

    public function toMultipart(): array
    {
        return [
            [
                'name' => 'file',
                'contents' => $this->file,
                'filename' => 'file.pdf',
            ],
        ];
    }
}
