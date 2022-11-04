<?php

namespace Katyusha\Infrastructure\Support;

use ReflectionClass;

final class Reflection {
    protected ReflectionClass $reflection;

    public function __construct(protected object|string $reflectionOf) {
        $this->reflection = new ReflectionClass($this->reflectionOf);
    }

    public static function make(object|string $reflectionOf): self {
        return new self($reflectionOf);
    }

    public function propertiesArray(): array {
        return _::extractPropertiesFromArrayItems($this->reflection->getProperties(), 'name');
    }
}
