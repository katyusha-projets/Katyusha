<?php

namespace Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Nova\Resources\Instances\InstanceResource;

class User extends Resource {
    public static $model  = \App\Models\User::class;
    public static $title  = 'name';
    public static $search = [
        'id', 'name', 'email',
    ];

    public function fields(NovaRequest $request) {
        return [
            ID::make()->sortable(),
            Gravatar::make()->maxWidth(50),
            Text::make('Name')->sortable()->rules('required', 'max:255'),
            Text::make('Email')->sortable()->rules('required', 'email', 'max:254')->creationRules('unique:users,email')->updateRules('unique:users,email,{{resourceId}}'),
            Password::make('Password')->onlyOnForms()->creationRules('required', Rules\Password::defaults())->updateRules('nullable', Rules\Password::defaults()),
            BelongsTo::make('Instance', 'instance', InstanceResource::class)->nullable()
        ];
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(NovaRequest $request): array {
        return [];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(NovaRequest $request): array {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(NovaRequest $request): array {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(NovaRequest $request): array {
        return [];
    }
}
