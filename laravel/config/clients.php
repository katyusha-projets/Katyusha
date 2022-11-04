<?php

return [
    'reddit' => [
        'app_id'       => env('REDDIT_APP_ID', ''),
        'app_secret'   => env('REDDIT_APP_SECRET', ''),
        'base_url'     => 'https://ssl.reddit.com/',
        'oauth_url'    => 'https://oauth.reddit.com/api/v1/'
    ],

    'discord' => [
        'app_id'         => env('DISCORD_APP_ID', ''),
        'public_key'     => env('DISCORD_PUBLIC_KEY', ''),
        'secret'         => env('DISCORD_APP_SECRET', ''),

        'bot' => [
            'token'      => env('DISCORD_BOT_TOKEN'),
            'add_url'    => 'https://discord.com/api/oauth2/authorize?client_id=1025162854690725929&permissions=8&redirect_uri=https%3A%2F%2Fkatyusha.app%2Foauth%2Fdiscord%2Fredirect%2F&response_type=code&scope=identify%20email%20bot%20webhook.incoming'
        ]
    ]
];
