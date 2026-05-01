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
class Settings extends BaseService
{
  /** @var array|null Method-level configuration for setEnvelopeAttachmentsSettings */
  protected ?array $setEnvelopeAttachmentsSettingsConfig = null;

  /**
   * Set method-level configuration for setEnvelopeAttachmentsSettings.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeAttachmentsSettingsConfig(array $config): static
  {
    $this->setEnvelopeAttachmentsSettingsConfig = $config;
    return $this;
  }

  /**
   * Set envelope attachment settings
   * @return mixed
   */
  public function setEnvelopeAttachmentsSettings(
    Models\SetEnvelopeAttachmentsSettingsRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeAttachmentsSettingsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/attachments/settings",
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
