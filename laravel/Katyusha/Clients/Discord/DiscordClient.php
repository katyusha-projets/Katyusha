<?php

namespace Katyusha\Clients\Discord;

use Discord\Discord;
use Discord\WebSockets\Intents;
use Discord\Exceptions\IntentException;

class DiscordClient {
    public Discord $discord;

    /**
     * @throws IntentException
     */
    public function __construct() {
        $this->discord = new Discord([
            'token'      => config('clients.discord.bot.token'),
            'intents'    => Intents::getDefaultIntents() | Intents::MESSAGE_CONTENT,
            'pmChannels' => true,
        ]);
    }
}
