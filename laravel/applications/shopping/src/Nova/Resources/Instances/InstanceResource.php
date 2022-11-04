<?php

namespace Nova\Resources\Instances;

use Nova\Form;
use Nova\AdminResource;
use Modules\Instances\Instance;
use Nova\Resources\Clients\ClientResource;
use Laravel\Nova\Http\Requests\NovaRequest;

class InstanceResource extends AdminResource {
    public static $model = Instance::class;
    public static $group = 'Shops';
    public static $title = 'name';

    public function fields(NovaRequest $request) {
        return Form::make($request)
            ->belongsTo('Client', ClientResource::class)
            ->text('Name')
            ->text('Domain')
            ->select('Currency', ['EUR' => 'EUR', 'NOK' => 'NOK'], true)
            ->bool('stripe_production_mode')
            ->text('stripe_publishable_key_test')
            ->text('stripe_secret_key_test')
            ->text('stripe_publishable_key_prod')
            ->text('stripe_secret_key_prod')
            ->file('Banner')
            ->file('Logo')
            ->file('Logo White')
            ->toArray();
    }
}
