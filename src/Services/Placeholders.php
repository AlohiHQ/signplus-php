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
class Placeholders extends BaseService
{
  /** @var array|null Method-level configuration for setEnvelopeAttachmentsPlaceholders */
  protected ?array $setEnvelopeAttachmentsPlaceholdersConfig = null;

  /**
   * Set method-level configuration for setEnvelopeAttachmentsPlaceholders.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setSetEnvelopeAttachmentsPlaceholdersConfig(array $config): static
  {
    $this->setEnvelopeAttachmentsPlaceholdersConfig = $config;
    return $this;
  }

  /**
   * Placeholders to be set, completely replacing the existing ones.
   * @return mixed
   */
  public function setEnvelopeAttachmentsPlaceholders(
    Models\SetEnvelopeAttachmentsPlaceholdersRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->setEnvelopeAttachmentsPlaceholdersConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'put',
      "/envelope/{$envelopeId}/attachments/placeholders",
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
