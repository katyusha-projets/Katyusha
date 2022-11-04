<?php

namespace FoldingMoney\Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;
use FoldingMoney\Domains\Tickers\Ticker;
use Illuminate\Support\Facades\Notification;
use FoldingMoney\Notifications\TickerPriceNotification;

class NotifyTickerPriceTest extends TestCase {
    /** @test */
    public function it_notifies_ticker_price_update() {
        Notification::fake();

        $ticker = Ticker::factory()->create();

        // the User model has the 'Notifiable' trait
        $user = User::factory()->create();

        Notification::assertNothingSent();

        $user->notify(new TickerPriceNotification($ticker));

        Notification::assertSentTo(
            $user,
            TickerPriceNotification::class,
            fn (TickerPriceNotification $notification) => $notification->ticker->name === $ticker->name
        );
    }
}
