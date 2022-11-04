<?php

namespace Katyusha\Infrastructure\Support;

use Exception;
use Throwable;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\AttributeValidator;

/**
 * @method static mixed run(...$args)
 * @method static mixed dispatch(...$args)
 */
abstract class Action {
    use AsAction;

    public function rules(): array {
        return [];
    }

    public function withValidator(AttributeValidator $validator, ActionRequest $request): void {
        $validator->validate();
    }

    public function asJob(...$args): void {
        $this->handle(...$args);
    }

    public function asController(...$args): JsonResponse {
        try {
            $response = $this->handle(...$args);
        } catch(Exception $e) {
            return $this->failed($e, $e->getCode());
        }

        return $this->success($response);
    }

    public function success(object|array $response): JsonResponse {
        return response()->json($response);
    }

    protected function failed(Throwable $exception, ?int $errorCode = 500): JsonResponse {
        return response()->json(['message' => $exception->getMessage()])->setStatusCode($errorCode);
    }
}
