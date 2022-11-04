<?php

namespace FoldingMoney\Domains\FinancialRecords;

abstract class FinancialRecordEntityGenerator {
    public static function generate(string $objectName, object $object): void {
        $properties = [];
        $className  = str_replace(' ', '', ucwords(str_replace('_', ' ', mb_strtolower($objectName))));
        $namespace  = 'FoldingMoney\Domains\FinancialRecords\Entities';

        foreach ($object as $k => $v) {
            $properties[] = ['type' => gettype($v), 'key' => $k];
        }

        $content = self::build($namespace, $properties, $className);
        file_put_contents(__DIR__.'/Entities/'.$className.'.php', $content);
    }

    protected static function build(string $namespace, array $properties, string $className): string {
        $class = '<?php';
        $class .= "\n namespace {$namespace};\n";
        $class .= "/**\n";

        $propertiesString = '';
        foreach ($properties as $prop) {
            $propertiesString .= "* @property {$prop['type']} {$prop['key']}\n";
        }

        $class .= $propertiesString;
        $class .= "*/\n";
        $class .= "final class {$className} {\n";

        $class .= 'public function __construct(protected object $baseObject) {
        $this->setProperties();
    }

    protected function setProperties(): void {
        foreach($this->baseObject as $k => $v) {
            $this->{$k} = $v;
        }
    }

    public static function make(object $baseObject): self {
        return new self($baseObject);
    }
}';

        return $class;
    }
}
