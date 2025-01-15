<?php

namespace Signplus\Services;

use Signplus\Environment;
use Signplus\Retry;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

class BaseService
{
    protected $client;
    protected string $baseUrl;
    protected array $options;
    protected HandlerStack $stack;

    protected string $tokenPrefix;

    public function __construct(
        string $accessToken,
        string $tokenPrefix = 'Bearer ',
        string $environment = Environment::Default,
        float $timeout = 0
    ) {
        $this->tokenPrefix = $tokenPrefix;

        $this->options = [
            'headers' => ['Authorization' => $this->tokenPrefix . $accessToken],
        ];

        $this->baseUrl = $environment;

        $stack = HandlerStack::create();

        $stack->push(Retry::factory());

        $this->stack = $stack;

        $this->client = new Client([
            'handler' => $stack,
            'timeout' => $timeout / 1000,
        ]);
    }

    protected function sendRequest($method, $uri, array $options = [])
    {
        $response = $this->client->request(
            $method,
            $this->baseUrl . $uri,
            array_replace_recursive($this->options, $options)
        );
        return $response->getBody()->getContents();
    }

    public function setBaseUrl(string $url): void
    {
        $this->baseUrl = $url;
    }

    public function setTimeout(float $timeout): void
    {
        $this->client = new Client([
            'handler' => $this->stack,
            'timeout' => $timeout / 1000,
        ]);
    }

    public function setAccessToken(string $apiKey): void
    {
        $this->options['headers']['Authorization'] = $this->tokenPrefix . $apiKey;
    }
}
