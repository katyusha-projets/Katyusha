<?php

namespace Katyusha\Services\Payments\Enums;

enum PaymentStatusEnum: string {
    case PENDING   = 'pending';
    case CANCELLED = 'cancelled';
    case DECLINED  = 'declined';
    case APPROVED  = 'approved';
    case PAID      = 'paid';
    case COMPLETE  = 'complete';

    public function isPaid(): bool {
        return match ($this) {
            self::PENDING,
            self::APPROVED,
            self::CANCELLED,
            self::DECLINED => false,
            self::PAID,
            self::COMPLETE => true,
        };
    }

    public function failed(): bool {
        return match ($this) {
            self::CANCELLED,
            self::DECLINED => true,
            default        => false
        };
    }

    public static function getFromVippsStatus(string $status): self {
        return self::PENDING;
    }

    public static function getFromStripeStatus(string $status): self {
        return self::PENDING;
    }
}
