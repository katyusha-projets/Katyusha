<?php

namespace App\Nova\Traits;

use Illuminate\Http\Request;

trait ReadOnlyResource {
    public static function authorizedToCreate(Request $request) {
        return false;
    }

    public function authorizedToDelete(Request $request) {
        return false;
    }

    public function authorizedToUpdate(Request $request) {
        return false;
    }
}
