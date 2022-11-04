<?php

namespace Laravel\Nova;

use Spatie\Once\Cache;
use Laravel\Nova\Query\Builder;
use Illuminate\Auth\Events\Logout;
use Illuminate\Container\Container;
use Laravel\Nova\Listeners\BootNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Contracts\QueryBuilder;
use Laravel\Octane\Events\RequestReceived;
use Laravel\Nova\Http\Middleware\ServeNova;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Contracts\ImpersonatesUsers;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Laravel\Nova\Auth\Adapters\SessionImpersonator;
use Illuminate\Foundation\Http\Events\RequestHandled;

/**
 * The primary purpose of this service provider is to push the ServeNova
 * middleware onto the middleware stack so we only need to register a
 * minimum number of resources for all other incoming app requests.
 */
class NovaCoreServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any package services.
     */
    public function boot(): void {
        Nova::booted(BootNova::class);

        if ($this->app->runningInConsole()) {
            $this->app->register(NovaServiceProvider::class);
        }

        if (!$this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config/nova.php', 'nova');
        }

        Route::middlewareGroup('nova', config('nova.middleware', []));
        Route::middlewareGroup('nova:api', config('nova.api_middleware', []));

        $this->app->make(HttpKernel::class)
            ->pushMiddleware(ServeNova::class);

        $this->app->afterResolving(NovaRequest::class, function ($request, $app) {
            if (!$app->bound(NovaRequest::class)) {
                $app->instance(NovaRequest::class, $request);
            }
        });

        $this->registerEvents();
        $this->registerResources();
    }

    /**
     * Register any application services.
     */
    public function register(): void {
        if (!defined('NOVA_PATH')) {
            define('NOVA_PATH', realpath(__DIR__.'/../'));
        }

        $this->app->singleton(ImpersonatesUsers::class, SessionImpersonator::class);

        $this->app->bind(QueryBuilder::class, fn ($app, $parameters) => new Builder(...$parameters));
    }

    /**
     * Register the package events.
     */
    protected function registerEvents(): void {
        tap($this->app['events'], function ($event) {
            $event->listen(Attempting::class, function () {
                app(ImpersonatesUsers::class)->flushImpersonationData(request());
            });

            $event->listen(Logout::class, function () {
                app(ImpersonatesUsers::class)->flushImpersonationData(request());
            });

            $event->listen(RequestReceived::class, function ($event) {
                Nova::flushState();
                // @phpstan-ignore-next-line
                Cache::getInstance()->flush();

                $event->sandbox->forgetInstance(ImpersonatesUsers::class);
            });

            $event->listen(RequestHandled::class, function ($event) {
                Container::getInstance()->forgetInstance(NovaRequest::class);
            });
        });
    }

    /**
     * Register the package resources such as routes, templates, etc.
     */
    protected function registerResources(): void {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'nova');

        $this->registerRoutes();
    }

    /**
     * Register the package routes.
     */
    protected function registerRoutes(): void {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        });
    }

    /**
     * Get the Nova route group configuration array.
     *
     * @return array{domain: string|null, as: string, prefix: string, middleware: string}
     */
    protected function routeConfiguration() {
        return [
            'domain'     => config('nova.domain', null),
            'as'         => 'nova.api.',
            'prefix'     => 'nova-api',
            'middleware' => 'nova:api',
        ];
    }
}
