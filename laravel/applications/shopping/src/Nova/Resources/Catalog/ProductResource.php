<?php

namespace Nova\Resources\Catalog;

use Nova\Form;
use Modules\Catalog\Product;
use Laravel\Nova\Http\Requests\NovaRequest;
use Nova\Resources\Instances\InstanceResource;

class ProductResource extends InstanceResource {
    public static $model = Product::class;
    public static $group = 'Catalog';
    public static $title = 'name';

    public function fields(NovaRequest $request) {
        return Form::make($request)
            ->belongsTo('Instance', InstanceResource::class)
            ->text('Name')
            ->bool('Active')
            ->belongsTo('Category', CategoryResource::class)
            ->textarea('Description')
            ->image('Image')
            ->money('Price')
            ->money('Sale Price')
            ->toArray();
    }
}
