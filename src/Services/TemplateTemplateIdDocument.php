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
class TemplateTemplateIdDocument extends BaseService
{
  /** @var array|null Method-level configuration for addTemplateDocument */
  protected ?array $addTemplateDocumentConfig = null;

  /**
   * Set method-level configuration for addTemplateDocument.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddTemplateDocumentConfig(array $config): static
  {
    $this->addTemplateDocumentConfig = $config;
    return $this;
  }

  /**
   * Add template document
   * @return mixed
   */
  public function addTemplateDocument(
    Models\AddTemplateDocumentRequest $input,
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->addTemplateDocumentConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/template/{$templateId}/document",
      [
        'multipart' => $input->toMultipart(),
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
