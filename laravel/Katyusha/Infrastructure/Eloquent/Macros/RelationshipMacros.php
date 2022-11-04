<?php

namespace Katyusha\Infrastructure\Eloquent\Macros;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * @method HasOne        hasOne($related, $foreignKey = null, $localKey = null)
 * @method BelongsTo     belongsTo($related, $foreignKey = null, $ownerKey = null, $relation = null)
 * @method HasOneThrough hasOneThrough($related, $through, $firstKey = null, $secondKey = null, $localKey = null, $secondLocalKey = null)
 * @method HasMany       hasMany($related, $foreignKey = null, $localKey = null)
 * @method BelongsToMany belongsToMany($related, $table = null, $foreignPivotKey = null, $relatedPivotKey = null, $parentKey = null, $relatedKey = null, $relation = null)
 */
class RelationshipMacros {
    public function __construct(protected string $relationshipName, protected string $modelClassToAttachRelation) {
    }

    public function __call(string $relation, array $args = []) {
        $attachToClass = $this->modelClassToAttachRelation;

        Builder::macro($this->relationshipName, function () use ($relation, $args, $attachToClass): mixed {
            $model = $this->getModel();

            if ($model instanceof $attachToClass) {
                return $model->{$relation}(...$args);
            }

            return null;
        });
    }
}
