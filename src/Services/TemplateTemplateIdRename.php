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
class TemplateTemplateIdRename extends BaseService
{
  /** @var array|null Method-level configuration for renameTemplate */
  protected ?array $renameTemplateConfig = null;

  /**
   * Set method-level configuration for renameTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setRenameTemplateConfig(array $config): static
  {
    $this->renameTemplateConfig = $config;
    return $this;
  }

  /**
   * Rename template
   * @return mixed
   */
  public function renameTemplate(
    Models\RenameTemplateRequest $input,
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->renameTemplateConfig, $requestConfig);
    $response = $this->sendRequest(
      'put',
      "/template/{$templateId}/rename",
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
