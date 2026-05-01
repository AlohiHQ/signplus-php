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
class TemplateTemplateIdSetNotification extends BaseService
{
  /** @var array|null Method-level configuration for setTemplateNotification */
  protected ?array $setTemplateNotificationConfig = null;

  /**
   * Set method-level configuration for setTemplateNotification.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetTemplateNotificationConfig(array $config): static
  {
    $this->setTemplateNotificationConfig = $config;
    return $this;
  }

  /**
   * Set template notification
   * @return mixed
   */
  public function setTemplateNotification(
    Models\SetTemplateNotificationRequest $input,
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setTemplateNotificationConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/template/{$templateId}/set_notification",
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
