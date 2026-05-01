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
class Void_ extends BaseService
{
  /** @var array|null Method-level configuration for voidEnvelope */
  protected ?array $voidEnvelopeConfig = null;

  /**
   * Set method-level configuration for voidEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setVoidEnvelopeConfig(array $config): static
  {
    $this->voidEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Void envelope
   * @return mixed
   */
  public function voidEnvelope(string $envelopeId, string $accept, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig($this->voidEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/void",
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
