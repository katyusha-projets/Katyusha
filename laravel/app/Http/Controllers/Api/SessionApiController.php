<?php

namespace App\Http\Controllers\Api;

use Modules\Sessions\Session;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ApiController;
use Modules\Sessions\Actions\NewSessionAction;

class SessionApiController extends ApiController {
    public function getOrCreate(): JsonResponse {
        if ($session = Session::loadFromRequest()) {
            return $session->jsonResponse();
        }

        return NewSessionAction::run()->jsonResponse();
    }
}
