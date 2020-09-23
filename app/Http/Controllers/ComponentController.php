<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function softSearch(Request $request) {
        // $input = $request->json();

        
        $response = [
            "apiCode" => 400,
            "message" => "Required parameters are missing",
            "exceptionWrappers" => null,
            "data" => null
        ];

        return response($response)->json();
    }
}