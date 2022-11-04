<?php

namespace Katyusha\Infrastructure\Eloquent;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Dyrynda\Database\Support\GeneratesUuid;
use Katyusha\Infrastructure\Eloquent\Macros\RelationshipMacros;

/**
 * @property string id
 *
 * @method static Builder whereId(string $id)
 * @method static Builder where(string $field, mixed $value)
 */
abstract class Model extends \Illuminate\Database\Eloquent\Model {
    use GeneratesUuid;

    public $incrementing        = false;
    public $uuidVersion         = 'uuid4';
    protected $keyType          = 'string';
    public $timestamps          = false;
    public static $disk         = 'media';

    public function uuidColumn(): string {
        return 'id';
    }

    public static function relationshipMacro(string $name): RelationshipMacros {
        return new RelationshipMacros($name, static::class);
    }

    public static function make(...$args): static {
        return new static(...$args);
    }

    public static function getById(string $id): ?static {
        return static::whereId($id)->first();
    }

    public static function mediaUrl(?string $file): ?string {
        if (!$file) {
            return null;
        }

        return Storage::disk(static::$disk)->url($file);
    }

    /**
     * @throws Throwable
     */
    public static function saveAll(array $data, ?array $stripKeys = [], ?array $appendData = [], ?callable $iterationCallback = null): void {
        $parsedRows = [];
        foreach ($data as $item) {
            $item = (array) $item;

            foreach ($stripKeys as $key) {
                unset($item[$key]);
            }

            foreach ($appendData as $k => $v) {
                $item[$k] = $v;
            }

            if ($iterationCallback) {
                $item = $iterationCallback($item);
            }

            $parsedRows[] = $item;
        }

        static::insertOrIgnore($parsedRows);
    }

    public function getUpdatedAtColumn() {
        return null;
    }

    /**
     * @return Collection
     */
    public function newCollection(array $models = []): mixed {
        return new Collection($models);
    }

    public function newEloquentBuilder($query): Builder {
        return new Builder($query);
    }

    public function newBuilder($query): Builder {
        return new Builder($query);
    }

    public function jsonResponse(): JsonResponse {
        return response()->json($this->toArray());
    }

    public function saveAndReturn(): static {
        $this->save();

        return $this;
    }
}
