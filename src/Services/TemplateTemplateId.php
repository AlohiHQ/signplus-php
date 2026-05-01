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
class TemplateTemplateId extends BaseService
{
  /** @var array|null Method-level configuration for getTemplate */
  protected ?array $getTemplateConfig = null;

  /** @var array|null Method-level configuration for deleteTemplate */
  protected ?array $deleteTemplateConfig = null;

  /**
   * Set method-level configuration for getTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetTemplateConfig(array $config): static
  {
    $this->getTemplateConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for deleteTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDeleteTemplateConfig(array $config): static
  {
    $this->deleteTemplateConfig = $config;
    return $this;
  }

  /**
   * Get template
   * @return mixed
   */
  public function getTemplate(string $templateId, string $accept, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig($this->getTemplateConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/template/{$templateId}",
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

  /**
   * Delete template
   * @return mixed
   */
  public function deleteTemplate(string $templateId, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig($this->deleteTemplateConfig, $requestConfig);
    $response = $this->sendRequest('delete', "/template/{$templateId}", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    return json_decode($data, true);
  }
}
