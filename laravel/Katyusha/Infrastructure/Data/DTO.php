<?php

namespace Katyusha\Infrastructure\Data;

use Katyusha\Infrastructure\Support\_;
use Illuminate\Contracts\Support\Arrayable;
use Katyusha\Infrastructure\Support\Reflection;

abstract class DTO implements Arrayable {
    public function toArray(): array {
        $res = [];
        foreach ($this as $k => $v) {
            $res[$k] = $v;
        }

        return $res;
    }

    public static function fromArray(array $array): static {
        $reflection = Reflection::make(static::class);
        $properties = _::intersect($array, $reflection->propertiesArray());

        return new static(...$properties);
    }

    public static function fromRequest(): static {
        $request = request();

        return new static(...$request->all());
    }
}
