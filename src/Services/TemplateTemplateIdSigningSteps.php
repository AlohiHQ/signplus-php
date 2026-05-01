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
class TemplateTemplateIdSigningSteps extends BaseService
{
  /** @var array|null Method-level configuration for addTemplateSigningSteps */
  protected ?array $addTemplateSigningStepsConfig = null;

  /**
   * Set method-level configuration for addTemplateSigningSteps.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddTemplateSigningStepsConfig(array $config): static
  {
    $this->addTemplateSigningStepsConfig = $config;
    return $this;
  }

  /**
   * Add template signing steps
   * @return mixed
   */
  public function addTemplateSigningSteps(
    Models\AddTemplateSigningStepsRequest $input,
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->addTemplateSigningStepsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'post',
      "/template/{$templateId}/signing_steps",
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
