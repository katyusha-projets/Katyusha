<?php

namespace App\Http\Controllers\Api;

use Modules\Orders\Order;
use DTO\Orders\LineItemDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ApiController;
use DTO\Orders\StripeClientCallbackDTO;
use Modules\Orders\Actions\CheckoutAction;
use Modules\Orders\Actions\CreateOrderAction;
use Modules\Orders\Actions\AddItemToOrderAction;
use Modules\Orders\Actions\HandleStripeCallbackAction;

class OrderApiController extends ApiController {
    public function addToCart(): JsonResponse {
        return AddItemToOrderAction::run(LineItemDTO::fromRequest())->saveAndReturn()->jsonResponse();
    }

    public function handleStripeCallback(): JsonResponse {
        return HandleStripeCallbackAction::run(StripeClientCallbackDTO::fromRequest())->saveAndReturn()->jsonResponse();
    }

   public function createOrder(): JsonResponse {
       return CreateOrderAction::run()->saveAndReturn()->jsonResponse();
   }

    public function checkout(Order $order, string $provider): mixed {
        return CheckoutAction::run($order, $provider);
    }
}
