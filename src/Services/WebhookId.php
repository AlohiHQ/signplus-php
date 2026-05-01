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
class WebhookId extends BaseService
{
  /** @var array|null Method-level configuration for deleteWebhook */
  protected ?array $deleteWebhookConfig = null;

  /**
   * Set method-level configuration for deleteWebhook.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDeleteWebhookConfig(array $config): static
  {
    $this->deleteWebhookConfig = $config;
    return $this;
  }

  /**
   * Delete webhook
   * @return mixed
   */
  public function deleteWebhook(string $webhookId, array $requestConfig = []): mixed
  {
    $resolvedConfig = $this->getResolvedConfig($this->deleteWebhookConfig, $requestConfig);
    $response = $this->sendRequest('delete', "/webhook/{$webhookId}", [], $resolvedConfig);
    $data = $response->getBody()->getContents();

    return json_decode($data, true);
  }
}
