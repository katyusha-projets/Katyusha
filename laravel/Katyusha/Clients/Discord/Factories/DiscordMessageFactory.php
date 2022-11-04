<?php

namespace Katyusha\Clients\Discord\Factories;

use Throwable;
use Discord\Parts\Embed\Embed;
use Discord\Builders\MessageBuilder;
use Discord\Builders\Components\ActionRow;

class DiscordMessageFactory {
    protected MessageBuilder $message;

    public function __construct(string $content, ?string $file = null) {
        $this->message = MessageBuilder::new()->setContent($content);

        if ($file) {
            try {
                $this->message->addFile($file);
            } catch (Throwable) {
            }
        }
    }

    public static function make(string $content, ?string $file = null): self {
        return new self($content, $file);
    }

    public static function imageResponse(string $file): MessageBuilder {
        return self::make('', $file)->get();
    }

    public function get(): MessageBuilder {
        return $this->message;
    }

    /**
     * @return $this
     */
    public function addButtons(mixed ...$buttons): self {
        $actionRow = ActionRow::new();

        foreach ($buttons as $button) {
            if ($button instanceof DiscordButtonFactory) {
                $button = $button->get();
            }

            $actionRow->addComponent($button);
        }

        $this->addRows($actionRow);

        return $this;
    }

    /**
     * @param ActionRow|ActionRow[] ...$rows
     *
     * @return $this
     */
    public function addRows(...$rows): self {
        foreach ($rows as $row) {
            $this->message->addComponent($row);
        }

        return $this;
    }


    public function addComponents(mixed ...$components): self {
        foreach ($components as $component) {
            $this->addComponents($component);
        }

        return $this;
    }

    /**
     * @param Embed[] ...$embeds
     */
    public function addEmbeds(...$embeds): self {
        foreach ($embeds as $embed) {
            $this->addEmbeds($embed);
        }

        return $this;
    }
}
