<?php

namespace Menuocity\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Katyusha\Clients\Exceptions\ClientRequestException;

class MenuocityApi {
    protected Client $client;
    protected string $url;

    public function __construct(
        protected string $username,
        protected string $password
    ) {
        $this->url    = config('menuocity.api.url');
        $this->client = new Client();
    }

    public function createToken() {
        return $this->post('Developers/Tokens/create', ['locid[]' => 0, 'project' => 'Katyusha']);
    }

    protected function getHeaders(): array {
        return [
            'Content-Type'  => 'application/json',
            'Authorization' => $this->username.':'.$this->password
        ];
    }

    protected function requestOptions(string $path): array {
        return [
            'headers' => $this->getHeaders($path)
        ];
    }

    /**
     * @throws ClientRequestException
     */
    private function request(string $method, string $path, array $urlParams = [], array $body = []): object|array {
        try {
            $request = $this->client->request(
                $method,
                $this->url.$path.(count($urlParams) ? '?'.http_build_query($urlParams) : ''),
                $this->requestOptions($path)
            );
        } catch (GuzzleException $e) {
            throw new ClientRequestException($e->getMessage(), $e->getCode(), $e);
        }

        $contents = $request->getBody()->getContents();

        try {
            return json_decode($contents, false, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new ClientRequestException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @throws ClientRequestException
     */
    protected function get(string $path, array $params = []): object|array {
        return $this->request('GET', $path, $params);
    }

    /**
     * @throws ClientRequestException
     */
    protected function post(string $path, array $body = []): object|array {
        return $this->request('POST', $path, body: $body);
    }
}
