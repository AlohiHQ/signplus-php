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
class DocumentId extends BaseService
{
  /** @var array|null Method-level configuration for getEnvelopeDocument */
  protected ?array $getEnvelopeDocumentConfig = null;

  /**
   * Set method-level configuration for getEnvelopeDocument.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetEnvelopeDocumentConfig(array $config): static
  {
    $this->getEnvelopeDocumentConfig = $config;
    return $this;
  }

  /**
   * Get envelope document
   * @return mixed
   */
  public function getEnvelopeDocument(
    string $envelopeId,
    string $documentId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->getEnvelopeDocumentConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/document/{$documentId}",
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
