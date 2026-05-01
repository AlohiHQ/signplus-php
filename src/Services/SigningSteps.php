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
class SigningSteps extends BaseService
{
  /** @var array|null Method-level configuration for addEnvelopeSigningSteps */
  protected ?array $addEnvelopeSigningStepsConfig = null;

  /**
   * Set method-level configuration for addEnvelopeSigningSteps.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddEnvelopeSigningStepsConfig(array $config): static
  {
    $this->addEnvelopeSigningStepsConfig = $config;
    return $this;
  }

  /**
   * Add envelope signing steps
   * @return mixed
   */
  public function addEnvelopeSigningSteps(
    Models\AddEnvelopeSigningStepsRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->addEnvelopeSigningStepsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'post',
      "/envelope/{$envelopeId}/signing_steps",
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
