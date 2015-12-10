<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyStats\Visitor;
use Illuminate\Support\Facades\Log;

class VisitorsController extends Controller {
    public function index() {
        $visitors = Visitor::all();

        return $this->respondWithJson($visitors);
    }

    public function track(Request $request) {
        Visitor::trackVisitor($request->getClientIp());

        return $this->respondWithJson(null);
    }
}
