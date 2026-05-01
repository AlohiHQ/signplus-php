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
class TemplateTemplateIdAnnotations extends BaseService
{
  /** @var array|null Method-level configuration for getTemplateAnnotations */
  protected ?array $getTemplateAnnotationsConfig = null;

  /**
   * Set method-level configuration for getTemplateAnnotations.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetTemplateAnnotationsConfig(array $config): static
  {
    $this->getTemplateAnnotationsConfig = $config;
    return $this;
  }

  /**
   * Get template annotations
   * @return mixed
   */
  public function getTemplateAnnotations(
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->getTemplateAnnotationsConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/template/{$templateId}/annotations",
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
