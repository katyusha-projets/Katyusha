<?php

namespace Katyusha\Infrastructure\Utils;

use Illuminate\Contracts\Support\Arrayable;

trait ArrayUtils {
    /**
     * Sums a property in an array or object.
     */
    public static function arrayPropertySum(Arrayable|array $array, string $key): int {
        $res = 0;
        foreach ($array as $item) {
            $res += is_array($item) ? $item[$key] : $item->{$key};
        }

        return $res;
    }

    /**
     * Extract property from array.
     */
    public static function extractPropertiesFromArrayItems(array $data, string $property): array {
        $res = [];
        foreach ($data as $item) {
            $res[] = $item->{$property};
        }

        return $res;
    }

    /**
     * Extracts specified keys from array or object.
     */
    public static function extract(array|object $array, ...$keys): array {
        $response = [];
        foreach ($array as $k => $v) {
            if (in_array($k, $keys, true)) {
                $response[$k] = $v;
            }
        }

        return $response;
    }

    /**
     * Returns an array with only the properties within the second array.
     */
    public static function intersect(array $fullArray, array $desiredProperties): array {
        $res = [];
        foreach ($desiredProperties as $key) {
            $res[$key] = $fullArray[$key] ?? null;
        }

        return $res;
    }

    /**
     * Takes the keys provided from $source and appends them to $destination.
     */
    public static function intersectAlt(object $destination, object $source, ...$keys): mixed {
        foreach ($keys as $key) {
            if (!isset($source->{$key})) {
                continue;
            }

            $destination->{$key} = $source->{$key};
        }

        return $destination;
    }
}
