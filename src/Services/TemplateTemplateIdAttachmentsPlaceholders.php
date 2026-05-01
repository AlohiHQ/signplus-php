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
class TemplateTemplateIdAttachmentsPlaceholders extends BaseService
{
  /** @var array|null Method-level configuration for setTemplateAttachmentsPlaceholders */
  protected ?array $setTemplateAttachmentsPlaceholdersConfig = null;

  /**
   * Set method-level configuration for setTemplateAttachmentsPlaceholders.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetTemplateAttachmentsPlaceholdersConfig(array $config): static
  {
    $this->setTemplateAttachmentsPlaceholdersConfig = $config;
    return $this;
  }

  /**
   * Placeholders to be set, completely replacing the existing ones.
   * @return mixed
   */
  public function setTemplateAttachmentsPlaceholders(
    Models\SetTemplateAttachmentsPlaceholdersRequest $input,
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setTemplateAttachmentsPlaceholdersConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/template/{$templateId}/attachments/placeholders",
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
