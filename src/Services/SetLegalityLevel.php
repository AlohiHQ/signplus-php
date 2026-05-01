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
class SetLegalityLevel extends BaseService
{
  /** @var array|null Method-level configuration for setEnvelopeLegalityLevel */
  protected ?array $setEnvelopeLegalityLevelConfig = null;

  /**
   * Set method-level configuration for setEnvelopeLegalityLevel.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeLegalityLevelConfig(array $config): static
  {
    $this->setEnvelopeLegalityLevelConfig = $config;
    return $this;
  }

  /**
   * Set envelope legality level
   * @return mixed
   */
  public function setEnvelopeLegalityLevel(
    Models\SetEnvelopeLegalityLevelRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeLegalityLevelConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/set_legality_level",
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
