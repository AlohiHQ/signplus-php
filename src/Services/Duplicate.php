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
class Duplicate extends BaseService
{
  /** @var array|null Method-level configuration for duplicateEnvelope */
  protected ?array $duplicateEnvelopeConfig = null;

  /**
   * Set method-level configuration for duplicateEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDuplicateEnvelopeConfig(array $config): static
  {
    $this->duplicateEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Duplicate envelope
   * @return mixed
   */
  public function duplicateEnvelope(
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->duplicateEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/envelope/{$envelopeId}/duplicate",
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
