<?php

namespace Katyusha\Services\Payments\Enums;

enum PaymentProvidersEnum: string {
    public const STRIPE = 'stripe';
    public const VIPPS  = 'vipps';
}
