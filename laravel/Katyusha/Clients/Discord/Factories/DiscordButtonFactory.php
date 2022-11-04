<?php

namespace Katyusha\Clients\Discord\Factories;

use Discord\Discord;
use Discord\Builders\Components\Button;

class DiscordButtonFactory {
    protected Button $button;

    public function __construct(protected Discord $discord, string $label, mixed $style, mixed $emoji = null) {
        $this->button = Button::new($style)
            ->setLabel($label)
            ->setEmoji($emoji);
    }

    public static function make(Discord $discord, string $label, mixed $style, mixed $emoji = null): self {
        return new self($discord, $label, $style, $emoji);
    }

    public function setUrl(string $url): self {
        $this->button->setUrl($url);

        return $this;
    }

    public function setListener(callable $callback, bool $oneOff = false): self {
        $this->button->setListener($callback, $this->discord, $oneOff);

        return $this;
    }

    public function get(): Button {
        return $this->button;
    }
}
