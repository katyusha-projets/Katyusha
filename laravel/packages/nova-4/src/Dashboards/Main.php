<?php

namespace Laravel\Nova\Dashboards;

use Laravel\Nova\Nova;
use Illuminate\Support\Str;
use Laravel\Nova\Dashboard;
use Laravel\Nova\Cards\Help;

class Main extends Dashboard {
    /**
     * Get the displayable name of the dashboard.
     */
    public function name() {
        return class_basename($this);
    }

    /**
     * Get the URI key of the dashboard.
     */
    public function uriKey() {
        return Str::snake(class_basename($this));
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     */
    public function cards() {
        return [
            new Help(),
        ];
    }
}
