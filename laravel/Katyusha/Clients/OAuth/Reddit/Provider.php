<?php

namespace Katyusha\Clients\OAuth\Reddit;

use GuzzleHttp\RequestOptions;
use SocialiteProviders\Manager\OAuth2\User;
use SocialiteProviders\Manager\OAuth2\AbstractProvider;
use Katyusha\Clients\OAuth\Exceptions\NoTokenPassedException;

class Provider extends AbstractProvider {
    public const IDENTIFIER = 'REDDIT';

    public function getScopes() {
        return config('services.reddit.scopes');
    }

    protected function buildAuthUrlFromBase($url, $state) {
        return parent::buildAuthUrlFromBase($url, $state).'&duration=permanent&grant_type=authorization_code';
    }

    protected function getAuthUrl($state): string {
        return $this->buildAuthUrlFromBase(
            'https://ssl.reddit.com/api/v1/authorize',
            $state
        );
    }

    protected function getTokenUrl(): string {
        return 'https://ssl.reddit.com/api/v1/access_token';
    }

    public function getUserByToken($token) {
        if (!$token) {
            throw new NoTokenPassedException();
        }

        $response = $this->getHttpClient()->get(
            'https://oauth.reddit.com/api/v1/me',
            [
                RequestOptions::HEADERS => [
                    'Authorization' => 'Bearer '.$token,
                ],
            ]
        );

        return json_decode((string) $response->getBody(), true);
    }

    protected function mapUserToObject(array $user) {
        $avatar = null;

        if (!empty($user['icon_img'])) {
            $avatar = $user['icon_img'];

            // Strip the query segment of the URL if it exists.
            // It provides resize attributes that we're not interested in.
            if ($querypos = mb_strpos($avatar, '?')) {
                $avatar = mb_substr($avatar, 0, $querypos);
            }
        }

        $name = null;
        //Check if user has a display name
        if (!empty($user['subreddit']['title'])) {
            $name = $user['subreddit']['title'];
        }


        return (new User())->setRaw($user)->map([
            'id'   => $user['id'], 'nickname' => $user['name'],
            'name' => $name, 'email' => null, 'avatar' => $avatar,
        ]);
    }

    public function getAccessTokenResponse($code) {
        $response = $this->getHttpClient()->post($this->getTokenUrl(), [
            RequestOptions::HEADERS => [
                'Accept'     => 'application/json',
                'User-Agent' => $this->getUserAgent(),
            ],
            RequestOptions::AUTH        => [$this->clientId, $this->clientSecret],
            RequestOptions::FORM_PARAMS => $this->getTokenFields($code),
        ]);

        $this->credentialsResponseBody = json_decode((string) $response->getBody(), true);

        return $this->credentialsResponseBody;
    }

    protected function getTokenFields($code) {
        return [
            'grant_type'   => 'authorization_code',
            'code'         => $code,
            'redirect_uri' => $this->redirectUrl,
        ];
    }

    protected function getUserAgent() {
        return config('app.name');
    }

    public static function additionalConfigKeys() {
        return ['platform', 'app_id', 'version_string'];
    }
}
