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
class SetExpirationDate extends BaseService
{
  /** @var array|null Method-level configuration for setEnvelopeExpirationDate */
  protected ?array $setEnvelopeExpirationDateConfig = null;

  /**
   * Set method-level configuration for setEnvelopeExpirationDate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeExpirationDateConfig(array $config): static
  {
    $this->setEnvelopeExpirationDateConfig = $config;
    return $this;
  }

  /**
   * Set envelope expiration date
   * @return mixed
   */
  public function setEnvelopeExpirationDate(
    Models\SetEnvelopeExpirationDateRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeExpirationDateConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/set_expiration_date",
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
