<?php

namespace Katyusha\Clients\Reddit;

use App\Models\User;
use Illuminate\Support\Str;
use Katyusha\Clients\_\Client;

class RedditClient extends Client {
    use RedditClientRequests;

    protected bool $requestPassUserPwd = true;

    public static function getUserClient(): static {
        return User::me()?->redditOAuth->reddit();
    }

    protected function getBaseUrl(): string {
        return config('clients.reddit.base_url');
    }

    protected function getAppId(): string {
        return config('clients.reddit.app_id');
    }

    protected function getAppSecret(): string {
        return config('clients.reddit.app_secret');
    }

    protected function getHeaders(string $path): array {
        $headers = [
            'Content-Type'  => 'application/json',
            'User-Agent'    => 'Bot/0.1 (by Katy)',
            'Accept'        => 'application/json',
        ];

        if (Str::contains($path, 'me')) {
            $headers['Authorization'] = 'bearer '.$this->auth->getAccessToken();
        }

        return $headers;
    }
}
