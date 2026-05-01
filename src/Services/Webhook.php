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
class Webhook extends BaseService
{
  /** @var array|null Method-level configuration for createWebhook */
  protected ?array $createWebhookConfig = null;

  /**
   * Set method-level configuration for createWebhook.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setCreateWebhookConfig(array $config): static
  {
    $this->createWebhookConfig = $config;
    return $this;
  }

  /**
   * Create webhook
   * @return mixed
   */
  public function createWebhook(
    Models\CreateWebhookRequest $input,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->createWebhookConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      '/webhook',
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
