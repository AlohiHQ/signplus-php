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
class TemplateId extends BaseService
{
  /** @var array|null Method-level configuration for createEnvelopeFromTemplate */
  protected ?array $createEnvelopeFromTemplateConfig = null;

  /**
   * Set method-level configuration for createEnvelopeFromTemplate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setCreateEnvelopeFromTemplateConfig(array $config): static
  {
    $this->createEnvelopeFromTemplateConfig = $config;
    return $this;
  }

  /**
   * Create new envelope from template
   * @return mixed
   */
  public function createEnvelopeFromTemplate(
    Models\CreateEnvelopeFromTemplateRequest $input,
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->createEnvelopeFromTemplateConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'post',
      "/envelope/from_template/{$templateId}",
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
