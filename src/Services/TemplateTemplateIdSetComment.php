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
class TemplateTemplateIdSetComment extends BaseService
{
  /** @var array|null Method-level configuration for setTemplateComment */
  protected ?array $setTemplateCommentConfig = null;

  /**
   * Set method-level configuration for setTemplateComment.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetTemplateCommentConfig(array $config): static
  {
    $this->setTemplateCommentConfig = $config;
    return $this;
  }

  /**
   * Set template comment
   * @return mixed
   */
  public function setTemplateComment(
    Models\SetTemplateCommentRequest $input,
    string $templateId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->setTemplateCommentConfig, $requestConfig);
    $response = $this->sendRequest(
      'put',
      "/template/{$templateId}/set_comment",
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
