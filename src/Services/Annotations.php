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
class Annotations extends BaseService
{
  /** @var array|null Method-level configuration for getEnvelopeAnnotations */
  protected ?array $getEnvelopeAnnotationsConfig = null;

  /**
   * Set method-level configuration for getEnvelopeAnnotations.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetEnvelopeAnnotationsConfig(array $config): static
  {
    $this->getEnvelopeAnnotationsConfig = $config;
    return $this;
  }

  /**
   * Get envelope annotations
   * @return mixed
   */
  public function getEnvelopeAnnotations(
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->getEnvelopeAnnotationsConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/annotations",
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
