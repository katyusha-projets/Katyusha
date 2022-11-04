<?php

namespace Katyusha\Clients\Contracts;

use Carbon\Carbon;

interface OAuthKeysContract {
    public function getAccessToken(): string;

    public function getRefreshToken(): string;

    public function getTokenExpiry(): Carbon;

    /**
     * Called when the token is expired, to refresh it.
     */
    public function updateAccessToken(string $token): bool;
}
