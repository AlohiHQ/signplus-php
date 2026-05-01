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
class Documents extends BaseService
{
  /** @var array|null Method-level configuration for getEnvelopeDocuments */
  protected ?array $getEnvelopeDocumentsConfig = null;

  /**
   * Set method-level configuration for getEnvelopeDocuments.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetEnvelopeDocumentsConfig(array $config): static
  {
    $this->getEnvelopeDocumentsConfig = $config;
    return $this;
  }

  /**
   * Get envelope documents
   * @return mixed
   */
  public function getEnvelopeDocuments(
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->getEnvelopeDocumentsConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/documents",
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
