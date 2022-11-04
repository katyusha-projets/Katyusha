<?php

namespace Katyusha\Infrastructure\Eloquent;

use Illuminate\Http\JsonResponse;

class Collection extends \Illuminate\Database\Eloquent\Collection {
    public function jsonResponse(): JsonResponse {
        return response()->json($this->toArray());
    }
}
