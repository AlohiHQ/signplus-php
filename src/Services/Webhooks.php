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
class Webhooks extends BaseService
{
  /** @var array|null Method-level configuration for listWebhooks */
  protected ?array $listWebhooksConfig = null;

  /**
   * Set method-level configuration for listWebhooks.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setListWebhooksConfig(array $config): static
  {
    $this->listWebhooksConfig = $config;
    return $this;
  }

  /**
   * List webhooks
   * @return mixed
   */
  public function listWebhooks(
    Models\ListWebhooksRequest $input,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->listWebhooksConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      '/webhooks',
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
