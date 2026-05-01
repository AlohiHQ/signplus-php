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
class TemplateTemplateIdAttachmentsSettings extends BaseService
{
  /** @var array|null Method-level configuration for setTemplateAttachmentsSettings */
  protected ?array $setTemplateAttachmentsSettingsConfig = null;

  /**
   * Set method-level configuration for setTemplateAttachmentsSettings.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetTemplateAttachmentsSettingsConfig(array $config): static
  {
    $this->setTemplateAttachmentsSettingsConfig = $config;
    return $this;
  }

  /**
   * Set template attachment settings
   * @return mixed
   */
  public function setTemplateAttachmentsSettings(
    Models\SetTemplateAttachmentsSettingsRequest $input,
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setTemplateAttachmentsSettingsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/template/{$templateId}/attachments/settings",
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
