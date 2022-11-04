<?php

namespace Katyusha\Infrastructure\Utils;

trait TypesUtils {
    /**
     * Get value type.
     */
    public static function getScalarType(mixed $value): string {
        $type = gettype($value);

        if ($type === 'NULL') {
            $type = 'mixed';
        }

        if ($type === 'integer') {
            $type = 'int';
        }

        if ($type === 'boolean') {
            $type = 'bool';
        }

        return $type;
    }
}
