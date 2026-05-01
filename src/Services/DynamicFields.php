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
class DynamicFields extends BaseService
{
  /** @var array|null Method-level configuration for setEnvelopeDynamicFields */
  protected ?array $setEnvelopeDynamicFieldsConfig = null;

  /**
   * Set method-level configuration for setEnvelopeDynamicFields.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeDynamicFieldsConfig(array $config): static
  {
    $this->setEnvelopeDynamicFieldsConfig = $config;
    return $this;
  }

  /**
   * Set envelope dynamic fields
   * @return mixed
   */
  public function setEnvelopeDynamicFields(
    Models\SetEnvelopeDynamicFieldsRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeDynamicFieldsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/dynamic_fields",
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
