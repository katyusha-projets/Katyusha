<?php

namespace Katyusha\Clients\Discord;

use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\Parts\Channel\Message;

class DiscordBot {
    protected DiscordClient $client;
    protected Discord $discord;

    public function __construct() {
        $this->client  = new DiscordClient();
        $this->discord = $this->client->discord;

        $this->initialize();
    }

    protected function initialize(): void {
        $this->setupListeners();
        $this->discord->run();
    }

    protected function setupListeners(): void {
        $this->discord->on('ready', function (Discord $discord) {
            $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
                $this->onMessage($message, $discord);
            });
        });
    }

    protected function getMessageCallback(string $message): ?callable {
        return config('discord-bot.listeners.message.'.$message);
    }

    protected function onMessage(Message $message, Discord $discord): void {
        // Do not listen to bots
        if ($message->author?->bot) {
            return;
        }

        if (!$callback = $this->getMessageCallback(mb_strtolower($message->content))) {
            return;
        }

        $callback($message, $discord);
    }
}
