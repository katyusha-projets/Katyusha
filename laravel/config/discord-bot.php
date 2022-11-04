<?php

use Discord\Parts\Channel\Message;
use Discord\Builders\MessageBuilder;
use Discord\Builders\Components\Button;
use Discord\Parts\Interactions\Interaction;
use Katyusha\Clients\Discord\Factories\DiscordButtonFactory;
use Katyusha\Clients\Discord\Factories\DiscordMessageFactory;

return [
    'listeners' => [
        'message' => [
            'ping' => static function (Message $message) {
                $builder = MessageBuilder::new()->setContent('better code setup test')->addFile(base_path('tohru.jpg'));
                $message->reply($builder);
            },

            'hit me' => static function (Message $message, mixed $discord) {
                $response = DiscordMessageFactory::make('Response using factory 😎')
                    ->addButtons(
                        DiscordButtonFactory::make($discord, 'CLICK ME SENPAI', Button::STYLE_SUCCESS, '🥵')
                            ->setListener(
                                static function (Interaction $interaction) {
                                    $interaction->respondWithMessage(DiscordMessageFactory::imageResponse(public_path('ahegao.jpg')));
                                }
                            )
                    );

                $message->reply($response->get());
            }
        ]
    ]
];
