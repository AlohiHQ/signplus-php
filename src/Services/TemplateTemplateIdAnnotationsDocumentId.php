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
class TemplateTemplateIdAnnotationsDocumentId extends BaseService
{
  /** @var array|null Method-level configuration for getDocumentTemplateAnnotations */
  protected ?array $getDocumentTemplateAnnotationsConfig = null;

  /**
   * Set method-level configuration for getDocumentTemplateAnnotations.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetDocumentTemplateAnnotationsConfig(array $config): static
  {
    $this->getDocumentTemplateAnnotationsConfig = $config;
    return $this;
  }

  /**
   * Get document template annotations
   * @return mixed
   */
  public function getDocumentTemplateAnnotations(
    string $templateId,
    string $documentId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->getDocumentTemplateAnnotationsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'get',
      "/template/{$templateId}/annotations/{$documentId}",
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
