<?php

namespace Katyusha\Clients\OAuth\Reddit;

use SocialiteProviders\Manager\SocialiteWasCalled;

class RedditExtendSocialite {
    public function handle(SocialiteWasCalled $socialiteWasCalled) {
        $socialiteWasCalled->extendSocialite('reddit', Provider::class);
    }
}
