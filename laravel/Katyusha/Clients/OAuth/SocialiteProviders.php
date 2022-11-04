<?php

namespace Katyusha\Clients\OAuth;

use Laravel\Socialite\Facades\Socialite;
use Katyusha\Clients\OAuth\Reddit\Provider as RedditProvider;
use Katyusha\Clients\OAuth\Discord\Provider as DiscordProvider;

class SocialiteProviders {
    public static function getProvider(string $name): RedditProvider | DiscordProvider {
        return self::{$name}();
    }

    public static function reddit(): RedditProvider {
        return Socialite::driver('reddit');
    }

    public static function discord(): DiscordProvider {
        return Socialite::driver('discord');
    }
}
