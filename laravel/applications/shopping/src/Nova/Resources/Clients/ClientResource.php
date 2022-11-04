<?php

namespace Nova\Resources\Clients;

use Nova\Form;
use Nova\AdminResource;
use Modules\Clients\Client;
use Laravel\Nova\Http\Requests\NovaRequest;

class ClientResource extends AdminResource {
    public static $model = Client::class;
    public static $group = 'Clients';
    public static $title = 'name';

    public function fields(NovaRequest $request) {
        return Form::make($request)
            ->text('Name')
            ->toArray();
    }
}
