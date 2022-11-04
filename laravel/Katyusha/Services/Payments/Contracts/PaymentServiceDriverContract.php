<?php

namespace Katyusha\Services\Payments\Contracts;

use Katyusha\Services\Payments\DTOs\PaymentStatusDTO;
use Katyusha\Services\Payments\DTOs\PaymentIntentResponse;

interface PaymentServiceDriverContract {
    /**
     * This will initiate the checkout method
     * It is responsible for calling any internal classes not defined in this contract.
     */
    public function initiateCheckout(): PaymentIntentResponse;

    /**
     * Checks the status of the order. Amount paid, status, etc.
     * Sometimes it needs to sleep to give the end payment system some time to process the order
     * Race race race race race!
     */
    public function checkOrderStatus(): ?PaymentStatusDTO;

    /**
     * Takes the amount paid and captures it.
     * It should return a status response with the total amount captured.
     */
    public function capture(): ?PaymentStatusDTO;

    /**
     * Refunds an order.
     */
    public function refund(int $amount, string $reason = ''): bool;
}
