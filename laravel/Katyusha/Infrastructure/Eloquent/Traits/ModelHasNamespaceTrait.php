<?php

namespace Katyusha\Infrastructure\Eloquent\Traits;

use Illuminate\Support\Str;
use Katyusha\Infrastructure\Eloquent\Model;
use Katyusha\Infrastructure\Eloquent\Builder;

/**
 * @property string name
 * @property string namespace
 *
 * @method static Builder whereNamespace(string $namespace)
 *
 * @mixin Model
 */
trait ModelHasNamespaceTrait {
    protected static function bootModelHasNamespaceTrait(): void {
        static::creating(static function ($model): void {
            $model->namespace = Str::slug(mb_strtolower($model->name));

            if (static::whereNamespace($model->namespace)->first()) {
                $model->namespace .= '-'.Str::random(8);
            }
        });
    }
}
