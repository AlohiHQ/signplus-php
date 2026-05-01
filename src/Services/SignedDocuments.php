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
class SignedDocuments extends BaseService
{
  /** @var array|null Method-level configuration for downloadEnvelopeSignedDocuments */
  protected ?array $downloadEnvelopeSignedDocumentsConfig = null;

  /**
   * Set method-level configuration for downloadEnvelopeSignedDocuments.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDownloadEnvelopeSignedDocumentsConfig(array $config): static
  {
    $this->downloadEnvelopeSignedDocumentsConfig = $config;
    return $this;
  }

  /**
   * Download signed documents for an envelope
   * @return mixed
   */
  public function downloadEnvelopeSignedDocuments(
    string $envelopeId,
    string $accept,
    ?string $certificateOfCompletion = null,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->downloadEnvelopeSignedDocumentsConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/signed_documents",
      [
        'headers' => [
          'Accept' => $accept
        ],
        'query' => [
          'certificate_of_completion' => $certificateOfCompletion
        ]
      ],
      $resolvedConfig
    );
    $data = $response->getBody()->getContents();

    return json_decode($data, true);
  }
}
