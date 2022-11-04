<?php

namespace Katyusha\Services\Payments\DTOs;

use Katyusha\Infrastructure\Data\DTO;
use Katyusha\Services\Payments\Enums\PaymentStatusEnum;

final class PaymentStatusDTO extends DTO {
    public function __construct(
        public int $amountPaid,
        public bool $paid,
        public bool $captured,
        public PaymentStatusEnum $status,
        public object $apiResponse
    ) {
    }
}
