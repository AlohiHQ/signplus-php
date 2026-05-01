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
class Envelope extends BaseService
{
  /** @var array|null Method-level configuration for createEnvelope */
  protected ?array $createEnvelopeConfig = null;

  /**
   * Set method-level configuration for createEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setCreateEnvelopeConfig(array $config): static
  {
    $this->createEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Create new envelope
   * @return mixed
   */
  public function createEnvelope(
    Models\CreateEnvelopeRequest $input,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->createEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      '/envelope',
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
