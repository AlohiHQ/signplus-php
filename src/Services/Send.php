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
class Send extends BaseService
{
  /** @var array|null Method-level configuration for sendEnvelope */
  protected ?array $sendEnvelopeConfig = null;

  /**
   * Set method-level configuration for sendEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSendEnvelopeConfig(array $config): static
  {
    $this->sendEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Send envelope for signature
   * @return mixed
   */
  public function sendEnvelope(string $envelopeId, string $accept, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig($this->sendEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/envelope/{$envelopeId}/send",
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
