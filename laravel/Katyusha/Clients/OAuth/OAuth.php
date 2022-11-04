<?php

namespace Katyusha\Clients\OAuth;

use Throwable;
use Carbon\Carbon;
use Katyusha\Clients\Reddit\RedditClient;
use Katyusha\Clients\Contracts\OAuthKeysContract;

class OAuth extends OAuthModel implements OAuthKeysContract {
    public function getAccessToken(): string {
        return $this->token;
    }

    public function getRefreshToken(): string {
        return $this->refresh_token;
    }

    public function getTokenExpiry(): Carbon {
        return $this->token_expires_at;
    }

    /**
     * @throws Throwable
     */
    public function updateAccessToken(string $token): bool {
        $this->token = $token;

        return $this->saveOrFail();
    }

    public function reddit(): ?RedditClient {
        return new RedditClient($this, SocialiteProviders::getProvider('reddit'));
    }
}
