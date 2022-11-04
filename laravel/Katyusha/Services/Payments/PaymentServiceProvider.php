<?php

namespace Katyusha\Services\Payments;

use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider {
    /**
     * Indicates if loading of the provider is deferred.
     */
    protected bool $defer = true;

    /**
     * Register any application services.
     */
    public function register(): void {
        $this->app->singleton('payment', fn ($app) => new PaymentService($app));
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array {
        return ['payment'];
    }
}
