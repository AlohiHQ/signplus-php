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
class TemplateTemplateIdAnnotation extends BaseService
{
  /** @var array|null Method-level configuration for addTemplateAnnotation */
  protected ?array $addTemplateAnnotationConfig = null;

  /**
   * Set method-level configuration for addTemplateAnnotation.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddTemplateAnnotationConfig(array $config): static
  {
    $this->addTemplateAnnotationConfig = $config;
    return $this;
  }

  /**
   * Add template annotation
   * @return mixed
   */
  public function addTemplateAnnotation(
    Models\AddTemplateAnnotationRequest $input,
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->addTemplateAnnotationConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/template/{$templateId}/annotation",
      [
        'json' => Serializer::serialize($input),
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
