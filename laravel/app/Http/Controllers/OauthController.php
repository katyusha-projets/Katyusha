<?php

namespace App\Http\Controllers;

use Throwable;
use DTO\OAuth\OauthDTO;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Katyusha\Clients\OAuth\OAuthModel;
use Katyusha\Infrastructure\Support\_;
use Katyusha\Clients\OAuth\SocialiteProviders;
use Katyusha\Clients\OAuth\Reddit\Provider as RedditProvider;
use Katyusha\Clients\OAuth\Discord\Provider as DiscordProvider;
use Katyusha\Clients\OAuth\Exceptions\OauthModelHandleException;

class OauthController extends Controller {
    protected RedditProvider | DiscordProvider $provider;

    public function __construct() {
        $provider       = Route::current()?->parameter('provider');
        $this->provider = SocialiteProviders::getProvider($provider);
    }

    public function auth(): RedirectResponse {
        return $this->provider->redirect();
    }

    /**
     * @throws OauthModelHandleException
     * @throws Throwable
     */
    public function redirect(string $provider): RedirectResponse {
        $user                  = $this->provider->stateless()->user();
        $dtoParams             = _::extract($user, 'id', 'token', 'refreshToken', 'expiresIn', 'avatar', 'nickname', 'name', 'email');
        $dtoParams['provider'] = $provider;
        $dto                   = OauthDTO::fromArray($dtoParams);
        $user                  = OAuthModel::handle($dto);

        return $user->login();
    }
}
