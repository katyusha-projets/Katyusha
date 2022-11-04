<?php

namespace Katyusha\Services\Payments\Contracts;

interface UsesPaymentDriverContract {
    public function getPaymentCurrency(): string;

    public function setPaymentStatus(string $status): static;

    public function setPaymentAttemptedTime(): static;

    public function setPaymentFailedTime(): static;

    public function setPaymentSuccessTime(): static;

    public function setRedirectUrl(string $url): static;

    public function setPaymentResponse(object $response): static;

    public function getPaymentAmount(): int;

    public function getProviderTransactionId(): ?string;

    public function setProviderTransactionId(string $id): static;
}
