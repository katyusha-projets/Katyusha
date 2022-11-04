<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;

class FollowStockAction extends Action {
    use InteractsWithQueue;
    use Queueable;

    /**
     * Perform the action on the given models.
     */
    public function handle(ActionFields $fields, Collection $models) {
        foreach ($models as $model) {
        }
    }
}
