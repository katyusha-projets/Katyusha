<?php

namespace Katyusha\Services\Payments\Drivers;

use Exception;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Modules\Orders\Payment;
use Stripe\Stripe as StripeBase;
use Stripe\Exception\ApiErrorException;
use Katyusha\Services\Payments\DTOs\PaymentStatusDTO;
use Katyusha\Services\Payments\DTOs\StripeApiKeysDTO;
use Modules\Orders\Actions\UpdatePaymentStatusAction;
use Katyusha\Services\Payments\Enums\PaymentStatusEnum;
use Katyusha\Services\Payments\DTOs\PaymentIntentResponse;
use Modules\Orders\Actions\UpdatePaymentWithIntentResponseAction;
use Katyusha\Services\Payments\Contracts\PaymentServiceDriverContract;
use Katyusha\Services\Payments\Exceptions\StripePaymentRequestException;
use Katyusha\Services\Payments\Exceptions\StripeOrderStatusCheckException;

/**
 * @property StripeClient client
 */
final class StripeDriver implements PaymentServiceDriverContract {
    protected StripeClient $client;

    public function __construct(
        protected StripeApiKeysDTO $apiKeys,
        protected Payment $paymentInterface
    ) {
        $this->client = new StripeClient($this->apiKeys->secretKey);
        StripeBase::setApiKey($apiKeys->secretKey);
    }

    /**
     * @throws StripePaymentRequestException
     */
    public function getPaymentIntent(): PaymentIntent {
        try {
            return $this->client->paymentIntents->retrieve($this->paymentInterface->getProviderTransactionId());
        } catch (ApiErrorException $exception) {
            throw new StripePaymentRequestException($exception->getMessage());
        }
    }

    /**
     * @throws StripePaymentRequestException
     */
    public function createPaymentIntent(): PaymentIntent {
        try {
            return PaymentIntent::create([
                'amount'   => $this->paymentInterface->getPaymentAmount(),
                'currency' => mb_strtolower($this->paymentInterface->getPaymentCurrency()),
                'metadata' => ['integration_check' => 'accept_a_payment'],
            ]);
        } catch (ApiErrorException $exception) {
            throw new StripePaymentRequestException($exception->getMessage());
        }
    }

    /**
     * @throws StripePaymentRequestException
     */
    public function initiateCheckout(): PaymentIntentResponse {
        $intent = $this->createPaymentIntent();

        $intent = new PaymentIntentResponse(
            amountPayable: $intent->amount,
            amountRequested: $this->paymentInterface->getPaymentAmount(),
            clientSecret: $intent->client_secret,
            publishableKey:  $this->apiKeys->publishableKey,
            testMode: $this->apiKeys->testMode,
            transactionId: $intent->id,
        );

        UpdatePaymentWithIntentResponseAction::run($this->paymentInterface, $intent);

        return $intent;
    }

    /**
     * @throws StripeOrderStatusCheckException
     */
    public function checkOrderStatus(): PaymentStatusDTO {
        try {
            $intent = $this->getPaymentIntent();
        } catch(Exception $e) {
            throw new StripeOrderStatusCheckException($e->getMessage());
        }

        $status = PaymentStatusEnum::getFromStripeStatus($intent->status);

        $response = new PaymentStatusDTO(
            amountPaid: $intent->amount_received,
            paid: $intent->amount_received === $this->paymentInterface->getPaymentAmount(),
            captured: true,
            status: $status,
            apiResponse: $intent
        );

        UpdatePaymentStatusAction::run($this->paymentInterface, $response);

        return $response;
    }

    public function refund(int $amount, string $reason = ''): bool {
        // TODO: Implement refund() method.
    }

    public function capture(): ?PaymentStatusDTO {
        // TODO: Implement capture() method.
    }
}
