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
class TemplateTemplateIdDocuments extends BaseService
{
  /** @var array|null Method-level configuration for getTemplateDocuments */
  protected ?array $getTemplateDocumentsConfig = null;

  /**
   * Set method-level configuration for getTemplateDocuments.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetTemplateDocumentsConfig(array $config): static
  {
    $this->getTemplateDocumentsConfig = $config;
    return $this;
  }

  /**
   * Get template documents
   * @return mixed
   */
  public function getTemplateDocuments(
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->getTemplateDocumentsConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/template/{$templateId}/documents",
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
