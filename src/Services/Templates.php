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
class Templates extends BaseService
{
  /** @var array|null Method-level configuration for listTemplates */
  protected ?array $listTemplatesConfig = null;

  /**
   * Set method-level configuration for listTemplates.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setListTemplatesConfig(array $config): static
  {
    $this->listTemplatesConfig = $config;
    return $this;
  }

  /**
   * List templates
   * @return mixed
   */
  public function listTemplates(
    Models\ListTemplatesRequest $input,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->listTemplatesConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      '/templates',
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
