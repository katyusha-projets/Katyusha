<?php

namespace App\Nova\Traits;

trait BelongsToUser {
    public static function newModel() {
        $model = parent::newModel();

        $model->user_id = me()->id;

        return $model;
    }
}
