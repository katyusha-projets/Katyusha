<?php

namespace Katyusha\Clients\Discord\Factories;

use Discord\Discord;
use Discord\Parts\Embed\Embed;
use Katyusha\Clients\Discord\Enum\DiscordEmbedTypesEnum;

class DiscordFactory {
    public static function embed(Discord $discord, DiscordEmbedTypesEnum $type, string $title, string $color): Embed {
        return (new Embed($discord))->setColor($color)->setType($type->value)->setTitle($title);
    }
}
