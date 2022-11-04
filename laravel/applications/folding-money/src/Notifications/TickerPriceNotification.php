<?php

namespace FoldingMoney\Notifications;

use FoldingMoney\Domains\Tickers\Ticker;
use Illuminate\Notifications\Notification;

class TickerPriceNotification extends Notification {
    public function __construct(public Ticker $ticker) {
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): \Illuminate\Notifications\Messages\MailMessage {
        return (new MailMessage())
            ->line("Your post '{$this->post->title}' was accepted")
            ->action('Notification Action', url("/posts/{$this->post->id}"))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array {
        return [

        ];
    }
}
