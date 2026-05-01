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
class TemplateTemplateIdDuplicate extends BaseService
{
  /** @var array|null Method-level configuration for duplicateTemplate */
  protected ?array $duplicateTemplateConfig = null;

  /**
   * Set method-level configuration for duplicateTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDuplicateTemplateConfig(array $config): static
  {
    $this->duplicateTemplateConfig = $config;
    return $this;
  }

  /**
   * Duplicate template
   * @return mixed
   */
  public function duplicateTemplate(
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->duplicateTemplateConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/template/{$templateId}/duplicate",
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
