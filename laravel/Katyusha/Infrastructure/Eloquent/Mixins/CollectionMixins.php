<?php

namespace Katyusha\Infrastructure\Eloquent\Mixins;

use ArrayAccess;
use Illuminate\Database\Eloquent\Collection;

/**
 * Trait EloquentCollectionMixins.
 *
 * @method static static     unique($key = null, $strict = false)
 * @method static static     collapse()
 * @method static static     merge(ArrayAccess|array  $items)
 * @method static Collection pluck(...$columns)                   Get a single column's value from the first result of a query.
 * @method static static     lists($column, $key = null)          Get an array with the values of a given column.
 * @method static static     map(callable $callable)
 */
trait CollectionMixins {
}
