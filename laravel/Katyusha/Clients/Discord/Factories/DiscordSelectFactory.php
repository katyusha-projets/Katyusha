<?php

namespace Katyusha\Clients\Discord\Factories;

use Discord\Discord;
use Discord\Builders\Components\Option;
use Discord\Builders\Components\SelectMenu;

class DiscordSelectFactory {
    protected SelectMenu $selectMenu;

    public function __construct(protected Discord $discord) {
        $this->selectMenu = SelectMenu::new();
    }

    public static function make(Discord $discord): self {
        return new self($discord);
    }

    public function addOption(string $label, mixed $value): self {
        $this->selectMenu->addOption(Option::new($label, $value));

        return $this;
    }

    public function setListener(callable $callback, bool $oneOff = false): self {
        $this->selectMenu->setListener($callback, $this->discord, $oneOff);

        return $this;
    }

    public function get(): SelectMenu {
        return $this->selectMenu;
    }
}
