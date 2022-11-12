<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ApiController;

class CustomerApiController extends ApiController {
    public function loginOrRegister(Request $request): JsonResponse {
        $user = User::loginOrRegister($request->get('mobileNumber'), $request->get('loginCode'));

        if (!$user) {
            return $this->json([]);
        }

        return User::whereId($user->id)->with('portfolios')->with('followingPortfolios')->with('tickersWatching')->first()->jsonResponse();
    }
}
