<?php

namespace Katyusha\Clients\Discord\Enum;

use Discord\Builders\Components\Button;

enum DiscordButtonStyleEnum: int {
    case STYLE_PRIMARY   = Button::STYLE_PRIMARY;
    case STYLE_SECONDARY = Button::STYLE_SECONDARY;
    case STYLE_SUCCESS   = Button::STYLE_SUCCESS;
    case STYLE_LINK      = Button::STYLE_LINK;
    case STYLE_DANGER    = Button::STYLE_DANGER;
}
