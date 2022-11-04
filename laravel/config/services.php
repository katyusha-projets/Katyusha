<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
     */

    'discord' => [
        'client_id'     => env('DISCORD_APP_ID'),
        'client_secret' => env('DISCORD_OAUTH_SECRET'),
        'redirect'      => env('DISCORD_REDIRECT_URI'),

        // optional
        'allow_gif_avatars'        => (bool) env('DISCORD_AVATAR_GIF', true),
        'avatar_default_extension' => env('DISCORD_EXTENSION_DEFAULT', 'jpg'), // only pick from jpg, png, webp
    ],

    'reddit' => [
        'client_id'     => env('REDDIT_APP_ID'),
        'client_secret' => env('REDDIT_APP_SECRET'),
        'redirect'      => env('APP_URL').'/oauth/reddit/redirect/',
        'scopes'        => explode(',', env('REDDIT_SCOPES'))
    ],

    'mailgun' => [
        'domain'   => env('MAILGUN_DOMAIN'),
        'secret'   => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme'   => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
