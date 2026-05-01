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
class TemplateTemplateIdDocumentDocumentId extends BaseService
{
  /** @var array|null Method-level configuration for getTemplateDocument */
  protected ?array $getTemplateDocumentConfig = null;

  /**
   * Set method-level configuration for getTemplateDocument.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetTemplateDocumentConfig(array $config): static
  {
    $this->getTemplateDocumentConfig = $config;
    return $this;
  }

  /**
   * Get template document
   * @return mixed
   */
  public function getTemplateDocument(
    string $templateId,
    string $documentId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->getTemplateDocumentConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/template/{$templateId}/document/{$documentId}",
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
