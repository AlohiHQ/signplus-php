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
class TemplateTemplateIdAnnotationAnnotationId extends BaseService
{
  /** @var array|null Method-level configuration for deleteTemplateAnnotation */
  protected ?array $deleteTemplateAnnotationConfig = null;

  /**
   * Set method-level configuration for deleteTemplateAnnotation.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDeleteTemplateAnnotationConfig(array $config): static
  {
    $this->deleteTemplateAnnotationConfig = $config;
    return $this;
  }

  /**
   * Delete template annotation
   * @return mixed
   */
  public function deleteTemplateAnnotation(
    string $templateId,
    string $annotationId,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->deleteTemplateAnnotationConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'delete',
      "/template/{$templateId}/annotation/{$annotationId}",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    return json_decode($data, true);
  }
}
