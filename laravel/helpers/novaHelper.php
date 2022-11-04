<?php

use Laravel\Nova\Nova;
use App\Collections\ModelsCollection;
use Laravel\Nova\NovaServiceProvider;
use Katyusha\Framework\Eloquent\Model;
use App\Collections\NovaResourceCollection;
use Katyusha\Framework\Eloquent\Collection;

function getAllNovaResourcesCollection(): NovaResourceCollection {
    app()->register(NovaServiceProvider::class);
    Nova::resourcesIn(app_path('Nova'));

    return NovaResourceCollection::make(Nova::$resources);
}


function getNovaModelsCollection(): Collection {
    $models = Collection::make();
    foreach (getAllNovaResourcesCollection() as $resource) {
        $model = $resource::newModel();

        if (!$model instanceof Model) {
            continue;
        }

        $models->add($model);
    }

    return ModelsCollection::make($models);
}


/**
 * @return array<string>|Collection
 */
function getAllNovaResourceTables(): Collection | array {
    $tables = new Collection();
    getNovaModelsCollection()->each(fn (Model $model) => $tables->add($model::_getTable()));

    return $tables;
}
