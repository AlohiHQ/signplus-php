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
class EnvelopeEnvelopeIdAnnotationsDocumentId extends BaseService
{
  /** @var array|null Method-level configuration for getEnvelopeDocumentAnnotations */
  protected ?array $getEnvelopeDocumentAnnotationsConfig = null;

  /**
   * Set method-level configuration for getEnvelopeDocumentAnnotations.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetEnvelopeDocumentAnnotationsConfig(array $config): static
  {
    $this->getEnvelopeDocumentAnnotationsConfig = $config;
    return $this;
  }

  /**
   * Get envelope document annotations
   * @return mixed
   */
  public function getEnvelopeDocumentAnnotations(
    string $envelopeId,
    string $documentId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->getEnvelopeDocumentAnnotationsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/annotations/{$documentId}",
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
