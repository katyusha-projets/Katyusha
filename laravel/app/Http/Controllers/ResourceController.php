<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

abstract class ResourceController extends Controller {
    public function index(): JsonResponse {
        return $this->json();
    }

    public function store(): JsonResponse {
        return $this->json();
    }

    public function create(Request $request): JsonResponse {
        return $this->json();
    }

    public function update(string $id): JsonResponse {
        return $this->json();
    }

    public function edit(string $id): JsonResponse {
        return $this->json();
    }
}
