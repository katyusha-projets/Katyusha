<?php

namespace Katyusha\Clients\OAuth\Discord;

use GuzzleHttp\RequestOptions;
use SocialiteProviders\Manager\OAuth2\User;
use SocialiteProviders\Manager\OAuth2\AbstractProvider;

class Provider extends AbstractProvider {
    public const IDENTIFIER = 'DISCORD';


    protected  $scopes = [
        'identify',
        'email',
    ];


    protected $scopeSeparator = ' ';

    protected function getAuthUrl($state) {
        return $this->buildAuthUrlFromBase(
            'https://discord.com/api/oauth2/authorize',
            $state
        );
    }

    protected function getTokenUrl() {
        return 'https://discord.com/api/oauth2/token';
    }

    protected function getUserByToken($token) {
        $response = $this->getHttpClient()->get(
            'https://discord.com/api/users/@me',
            [
                RequestOptions::HEADERS => [
                    'Authorization' => 'Bearer '.$token,
                ],
            ]
        );

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @see https://discord.com/developers/docs/reference#image-formatting-cdn-endpoints
     */
    protected function formatAvatar(array $user): ?string {
        if (empty($user['avatar'])) {
            return null;
        }

        $isGif     = preg_match('/a_.+/m', $user['avatar']) === 1;
        $extension = $this->getConfig('allow_gif_avatars', true) && $isGif ? 'gif' :
            $this->getConfig('avatar_default_extension', 'jpg');

        return sprintf('https://cdn.discordapp.com/avatars/%s/%s.%s', $user['id'], $user['avatar'], $extension);
    }

    protected function mapUserToObject(array $user) {
        return (new User())->setRaw($user)->map([
            'id'       => $user['id'],
            'nickname' => sprintf('%s#%s', $user['username'], $user['discriminator']),
            'name'     => $user['username'],
            'email'    => $user['email'] ?? null,
            'avatar'   => $this->formatAvatar($user),
        ]);
    }

    protected function getTokenFields($code) {
        return array_merge(parent::getTokenFields($code), [
            'grant_type' => 'authorization_code',
        ]);
    }

    public static function additionalConfigKeys() {
        return ['allow_gif_avatars', 'avatar_default_extension'];
    }
}
