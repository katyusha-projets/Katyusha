<?php

namespace Katyusha\Services\Payments\DTOs;

use Katyusha\Infrastructure\Data\DTO;

final class StripeApiKeysDTO extends DTO {
    public function __construct(
        public bool $testMode,
        public string $publishableKey,
        public string $secretKey
    ) {
    }
}
