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
class Template extends BaseService
{
  /** @var array|null Method-level configuration for createTemplate */
  protected ?array $createTemplateConfig = null;

  /**
   * Set method-level configuration for createTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setCreateTemplateConfig(array $config): static
  {
    $this->createTemplateConfig = $config;
    return $this;
  }

  /**
   * Create new template
   * @return mixed
   */
  public function createTemplate(
    Models\CreateTemplateRequest $input,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->createTemplateConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      '/template',
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
