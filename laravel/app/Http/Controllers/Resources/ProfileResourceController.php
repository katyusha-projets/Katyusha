<?php

namespace App\Http\Controllers\Resources;

use DTO\Profiles\ProfileDTO;
use Modules\Profiles\Profile;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ResourceController;

class ProfileResourceController extends ResourceController {
    public function store(): JsonResponse {
        return Profile::make()->fill(ProfileDTO::fromRequest()->toArray())->saveAndReturn()->jsonResponse();
    }

    public function show(string $username): JsonResponse {
        return Profile::where('username', $username)->first()?->jsonResponse();
    }
}
