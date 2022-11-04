<?php

namespace Katyusha\Infrastructure\Data;

use Attribute;
use OpenApi\Attributes as OAT;

#[Attribute]
class DTOAttribute {
    public OAT\JsonContent $content;

    public function __construct(
        public string $description,
        public string $dto
    ) {
        $this->content = new OAT\JsonContent(ref: "#/components/schemas/${dto}");
    }
}
