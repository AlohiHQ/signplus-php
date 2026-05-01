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
class Document extends BaseService
{
  /** @var array|null Method-level configuration for addEnvelopeDocument */
  protected ?array $addEnvelopeDocumentConfig = null;

  /**
   * Set method-level configuration for addEnvelopeDocument.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setAddEnvelopeDocumentConfig(array $config): static
  {
    $this->addEnvelopeDocumentConfig = $config;
    return $this;
  }

  /**
   * Add envelope document
   * @return mixed
   */
  public function addEnvelopeDocument(
    Models\AddEnvelopeDocumentRequest $input,
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig($this->addEnvelopeDocumentConfig, $requestConfig);
    $response = $this->sendRequest(
      'post',
      "/envelope/{$envelopeId}/document",
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
