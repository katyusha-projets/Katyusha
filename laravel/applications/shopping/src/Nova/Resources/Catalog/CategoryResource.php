<?php

namespace Nova\Resources\Catalog;

use Nova\Form;
use Modules\Catalog\Category;
use Laravel\Nova\Http\Requests\NovaRequest;
use Nova\Resources\Instances\InstanceResource;

class CategoryResource extends InstanceResource {
    public static $model = Category::class;
    public static $group = 'Catalog';
    public static $title = 'name';

    public function fields(NovaRequest $request) {
        return Form::make($request)
            ->belongsTo('Instance', InstanceResource::class)
            ->text('Name')
            ->image('Image')
            ->integer('Tax Rate Percent')
            ->belongsTo('Parent', self::class, true)
            ->toArray();
    }
}
