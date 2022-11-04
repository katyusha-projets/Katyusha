<?php

namespace Katyusha\Services\Payments;

use Modules\Orders\Payment;
use Katyusha\Infrastructure\Support\Manager;
use Katyusha\Services\Payments\Drivers\VippsDriver;
use Katyusha\Services\Payments\Drivers\StripeDriver;
use Katyusha\Services\Payments\DTOs\VippsApiKeysDTO;
use Katyusha\Services\Payments\DTOs\StripeApiKeysDTO;

class PaymentService extends Manager {
    /**
     * Just throw an exception. There's no "default" payment method.
     *
     * @throws CouldNotProvideDriverException
     */
    public function getDefaultDriver(): string {
        throw new CouldNotProvideDriverException();
    }

    public function createStripeDriver(StripeApiKeysDTO $apiConsignment, Payment $payment): StripeDriver {
        return new Stripe($apiConsignment, $payment);
    }

    public function createVippsDriver(VippsApiKeysDTO $apiConsignment, Payment $payment): VippsDriver {
        return new VippsDriver($apiConsignment, $payment);
    }
}
