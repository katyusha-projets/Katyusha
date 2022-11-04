<?php

namespace Nova;

use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Actions\Action as ActionAlias;
use Laravel\Nova\Actions\ActionModelCollection;

abstract class Action extends ActionAlias {
    public function __construct() {
        $this->runCallback = fn () => true;
    }

    abstract public function handle(ActionFields $fields, ActionModelCollection $models): mixed;
}
