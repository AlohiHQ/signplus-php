<?php

declare(strict_types=1);

namespace Signplus;

use Signplus\Services;

/**
 * Main SDK client providing access to all API service endpoints.
 *
 * This client acts as the central entry point for interacting with the API,
 * managing service instances, authentication, and base URL configuration.
 * Each service property provides access to a specific group of API endpoints.
 */
class Client
{
  public Services\Signplus $signplus;

  public function __construct(
    string $accessToken = '',
    string $tokenPrefix = 'Bearer ',
    string $environment = Environment::Default,
    float $timeout = 10000,
    array $retryConfig = [],
    ?\Psr\Http\Client\ClientInterface $httpClient = null
  ) {
    $this->signplus = new Services\Signplus(
      $accessToken,
      $tokenPrefix,
      $environment,
      $timeout,
      $retryConfig,
      $httpClient
    );
  }

  /**
   * Set the base URL for all API requests.
   *
   * This method updates the base URL for all service instances managed by this client.
   * Useful for switching between different environments or API versions at runtime.
   *
   * @param string $url The new base URL (e.g., 'https://api.example.com/v2')
   * @return void
   */
  public function setBaseUrl(string $url): void
  {
    $this->signplus->setBaseUrl($url);
  }

  /**
   * Configure authentication credentials for API requests.
   *
   * This method sets up the authentication mechanism used by all services.
   * Call this method before making any authenticated API requests.
   *
   * @return void
   */
  public function setAccessToken(string $accessToken): void
  {
    $this->signplus->setAccessToken($accessToken);
  }
}

// c029837e0e474b76bc487506e8799df5e3335891efe4fb02bda7a1441840310c
