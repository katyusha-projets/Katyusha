<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Actions\ActionEvent;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider {
    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        parent::boot();
        ActionEvent::saving(fn ($actionEvent) => false);
    }

    /**
     * Register the Nova routes.
     */
    protected function routes(): void {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     */
    protected function gate(): void {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [

            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     */
    protected function cards(): array {
        return [
            new Help(),
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     */
    protected function dashboards(): array {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     */
    public function tools(): array {
        return [];
    }

    /**
     * Register any application services.
     */
    public function register(): void {

    }
}
