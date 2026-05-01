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
class SetComment extends BaseService
{
  /** @var array|null Method-level configuration for setEnvelopeComment */
  protected ?array $setEnvelopeCommentConfig = null;

  /**
   * Set method-level configuration for setEnvelopeComment.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeCommentConfig(array $config): static
  {
    $this->setEnvelopeCommentConfig = $config;
    return $this;
  }

  /**
   * Set envelope comment
   * @return mixed
   */
  public function setEnvelopeComment(
    Models\SetEnvelopeCommentRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->setEnvelopeCommentConfig, $requestConfig);
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/set_comment",
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
