<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Profiles\Profile;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ApiController;

class CustomerApiController extends ApiController {
    public function loginOrRegister(Request $request): JsonResponse {
        return Profile::loginOrRegister($request->get('mobileNumber'), $request->get('loginCode'))->jsonResponse();
    }
}
