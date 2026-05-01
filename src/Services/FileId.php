<?php

declare(strict_types=1);

namespace Signplus\Services;

use Signplus\Utils\Serializer;
use Signplus\Models;

/**
 * Service class containing API endpoint methods.
 *
 * This class extends the base service to provide typed methods for specific API operations.
 * Each method corresponds to an API endpoint and handles request serialization,
 * execution, and response deserialization.
 */
class FileId extends BaseService
{
  /** @var array|null Method-level configuration for getAttachmentFile */
  protected ?array $getAttachmentFileConfig = null;

  /**
   * Set method-level configuration for getAttachmentFile.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetAttachmentFileConfig(array $config): static
  {
    $this->getAttachmentFileConfig = $config;
    return $this;
  }

  /**
   * Get envelope attachment file
   * @return mixed
   */
  public function getAttachmentFile(
    string $envelopeId,
    string $fileId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->getAttachmentFileConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/attachments/{$fileId}",
      [
        'headers' => [
          'Accept' => $accept
        ]
      ],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    return json_decode($data, true);
  }
}
