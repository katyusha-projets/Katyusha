<?php

namespace FoldingMoney\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class UserController extends Controller {
    public static function session(): JsonResponse {
        return User::usernameQuery('katyusha')->with('portfolios')->with('tickersWatching')->first()?->jsonResponse();
    }

    public function profile(string $username): JsonResponse {
        return User::usernameQuery($username)->with('portfolios')->with('tickersWatching')->first()?->jsonResponse();
    }

    public function show(string $username): JsonResponse {
        return User::usernameQuery($username)->first()?->jsonResponse();
    }
}
