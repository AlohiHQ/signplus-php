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
class Certificate extends BaseService
{
  /** @var array|null Method-level configuration for downloadEnvelopeCertificate */
  protected ?array $downloadEnvelopeCertificateConfig = null;

  /**
   * Set method-level configuration for downloadEnvelopeCertificate.
   *
   * @param array $config Configuration overrides for this method
   * @return $this
   */
  public function setDownloadEnvelopeCertificateConfig(array $config): static
  {
    $this->downloadEnvelopeCertificateConfig = $config;
    return $this;
  }

  /**
   * Download certificate of completion for an envelope
   * @return mixed
   */
  public function downloadEnvelopeCertificate(
    string $envelopeId,
    string $accept,
    array $requestConfig = []
  ): mixed {
    $resolvedConfig = $this->getResolvedConfig(
      $this->downloadEnvelopeCertificateConfig,
      $requestConfig
    );
    $response = $this->sendRequest(
      'get',
      "/envelope/{$envelopeId}/certificate",
      [
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
