<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OAT;
use Illuminate\Http\JsonResponse;
use Katyusha\Infrastructure\Support\Action;

#[OAT\Info(version: 0.1, title: 'Controller methods')]
#[OAT\Server(url: '/api', description: 'API controller')]
class ApiController extends Controller {
    public function runAction(string|Action $actionClass): JsonResponse {
        return $actionClass::run($actionClass::$DTOClass::fromRequest());
    }
}
