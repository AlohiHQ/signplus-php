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
class Annotation extends BaseService
{
  /** @var array|null Method-level configuration for addEnvelopeAnnotation */
  protected ?array $addEnvelopeAnnotationConfig = null;

  /**
   * Set method-level configuration for addEnvelopeAnnotation.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddEnvelopeAnnotationConfig(array $config): static
  {
    $this->addEnvelopeAnnotationConfig = $config;
    return $this;
  }

  /**
   * Add envelope annotation
   * @return mixed
   */
  public function addEnvelopeAnnotation(
    Models\AddEnvelopeAnnotationRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->addEnvelopeAnnotationConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/envelope/{$envelopeId}/annotation",
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
