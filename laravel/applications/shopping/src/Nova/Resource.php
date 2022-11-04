<?php

namespace Nova;

use Laravel\Nova\Resource as NovaResource;
use Laravel\Nova\Http\Requests\NovaRequest;

abstract class Resource extends NovaResource {
    /**
     * Build an "index" query for the given resource.
     */
    public static function indexQuery(NovaRequest $request, \Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder {
        return $query;
    }

    /**
     * Build a Scout search query for the given resource.
     */
    public static function scoutQuery(NovaRequest $request, \Laravel\Scout\Builder $query): \Laravel\Scout\Builder {
        return $query;
    }

    /**
     * Build a "detail" query for the given resource.
     */
    public static function detailQuery(NovaRequest $request, \Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder {
        return parent::detailQuery($request, $query);
    }

    /**
     * Build a "relatable" query for the given resource.
     *
     * This query determines which instances of the model may be attached to other resources.
     */
    public static function relatableQuery(NovaRequest $request, \Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder {
        return parent::relatableQuery($request, $query);
    }
}
