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
class EnvelopeId extends BaseService
{
  /** @var array|null Method-level configuration for getEnvelope */
  protected ?array $getEnvelopeConfig = null;

  /** @var array|null Method-level configuration for deleteEnvelope */
  protected ?array $deleteEnvelopeConfig = null;

  /**
   * Set method-level configuration for getEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setGetEnvelopeConfig(array $config): static
  {
    $this->getEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Set method-level configuration for deleteEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDeleteEnvelopeConfig(array $config): static
  {
    $this->deleteEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Get envelope
   * @return mixed
   */
  public function getEnvelope(string $envelopeId, string $accept, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig($this->getEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}",
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

  /**
   * Delete envelope
   * @return mixed
   */
  public function deleteEnvelope(string $envelopeId, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig($this->deleteEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest('delete', "/envelope/{$envelopeId}", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    return json_decode($data, true);
  }
}
