<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function respondWithJson($data, $statusCode = 200, $headers = []) {
        return response()->json($data, $statusCode, $headers);
    }
}
