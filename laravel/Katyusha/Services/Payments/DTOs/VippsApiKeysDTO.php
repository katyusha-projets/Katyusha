<?php

namespace Katyusha\Services\Payments\DTOs;

use Katyusha\Infrastructure\Data\DTO;

final class VippsApiKeysDTO extends DTO {
    public function __construct(
        public string $clientId,
        public string $clientSecret,
        public int $merchantSerialNumber,
        public string $ecommerceSubscriptionKey,
        public bool $productionMode = true
    ) {
    }
}
