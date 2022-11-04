<?php

namespace Menuocity;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;

class MenuCityApiTest {
    protected string $apiKey    = 'M007739f6dab0b12cc965d0053f66331411dd3ef72';
    protected string $secret    = '191faba727a21cbd76c611be';
    protected string $baseUrl   = 'https://cyvvsf9r17.execute-api.us-east-1.amazonaws.com/v1';
    protected string $tokenType = 'TOKEN';

    public function send(): mixed {
        $uri    = '/Store/details';
        $method = 'GET';

        return $this->request($this->secret, $this->apiKey, $uri, $method);
    }

    /**
     * @throws JsonException
     */
    private function request(string $key, string $token, string $uri, string $method, array $payload = []): mixed {
        $client         = new Client();
        $payloadEncoded = json_encode($payload, JSON_THROW_ON_ERROR);
        $signed         = $token.';'.hash_hmac('sha256', base64_encode($method.';'.base64_encode($payloadEncoded)), $key);

        try {
            $request = $client->request(
                $method,
                $this->baseUrl.$uri,
                [
                    'headers' => [
                        'Content-Type'  => 'application/json',
                        'Authorization' => 'Bearer '.$signed
                    ]
                ]
            );
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage(), $e->getCode(), $e);
        }

        $contents = $request->getBody()->getContents();

        try {
            return json_decode($contents, false, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new Exception($e->getMessage(), $e->getCode(), $e);
        }
    }
}
