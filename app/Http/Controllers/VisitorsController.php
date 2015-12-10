<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyStats\Visitor;

class VisitorsController extends Controller {
    public function index() {
        $visitors = Visitor::with('location')->get();

        return $this->respondWithJson($visitors);
    }

    public function track(Request $request) {
        Visitor::trackVisitor($request->getClientIp());

        return $this->respondWithJson(null);
    }
}
