<?php

namespace Katyusha\Services\Payments\DTOs;

use Katyusha\Infrastructure\Data\DTO;

class PaymentIntentResponse extends DTO {
    public function __construct(
        public int $amountPayable,
        public int $amountRequested,
        public string $clientSecret,
        public string $publishableKey,
        public bool $testMode,
        public ?string $transactionId = null,
    ) {
    }
}
