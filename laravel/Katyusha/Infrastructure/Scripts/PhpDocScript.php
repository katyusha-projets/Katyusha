<?php

namespace Katyusha\Infrastructure\Scripts;

use Katyusha\Infrastructure\Support\_;

class PhpDocScript {
    public static function paramsFromObject(object $object, string $visibility = 'public'): string {
        $res = '';
        foreach ((array) $object as $k => $v) {
            $type = _::getScalarType($v);
            $res .= "public {$type} \${$k}, \n";
        }

        return $res;
    }
}
