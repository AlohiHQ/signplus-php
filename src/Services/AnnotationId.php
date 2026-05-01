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
class AnnotationId extends BaseService
{
  /** @var array|null Method-level configuration for deleteEnvelopeAnnotation */
  protected ?array $deleteEnvelopeAnnotationConfig = null;

  /**
   * Set method-level configuration for deleteEnvelopeAnnotation.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDeleteEnvelopeAnnotationConfig(array $config): static
  {
    $this->deleteEnvelopeAnnotationConfig = $config;
    return $this;
  }

  /**
   * Delete envelope annotation
   * @return mixed
   */
  public function deleteEnvelopeAnnotation(
    string $envelopeId,
    string $annotationId,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->deleteEnvelopeAnnotationConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'delete',
      "/envelope/{$envelopeId}/annotation/{$annotationId}",
      [],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    return json_decode($data, true);
  }
}
