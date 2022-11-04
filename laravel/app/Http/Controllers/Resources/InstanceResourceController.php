<?php

namespace App\Http\Controllers\Resources;

use Modules\Instances\Instance;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ResourceController;

class InstanceResourceController extends ResourceController {
    public function settings(): JsonResponse {
        return Instance::getFromRequest()->jsonResponse();
    }
}
