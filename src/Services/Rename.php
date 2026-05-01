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
class Rename extends BaseService
{
  /** @var array|null Method-level configuration for renameEnvelope */
  protected ?array $renameEnvelopeConfig = null;

  /**
   * Set method-level configuration for renameEnvelope.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setRenameEnvelopeConfig(array $config): static
  {
    $this->renameEnvelopeConfig = $config;
    return $this;
  }

  /**
   * Rename envelope
   * @return mixed
   */
  public function renameEnvelope(
    Models\RenameEnvelopeRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->renameEnvelopeConfig, $requestConfig);
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/rename",
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
