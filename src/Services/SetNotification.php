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
class SetNotification extends BaseService
{
  /** @var array|null Method-level configuration for setEnvelopeNotification */
  protected ?array $setEnvelopeNotificationConfig = null;

  /**
   * Set method-level configuration for setEnvelopeNotification.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeNotificationConfig(array $config): static
  {
    $this->setEnvelopeNotificationConfig = $config;
    return $this;
  }

  /**
   * Set envelope notification
   * @return mixed
   */
  public function setEnvelopeNotification(
    Models\SetEnvelopeNotificationRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeNotificationConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/set_notification",
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
