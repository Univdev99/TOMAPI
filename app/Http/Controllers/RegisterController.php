<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function register(Request $request) {
        $response = json_encode([
            "apiCode"  =>  200,
            "message"  =>  "User saved successfully",
            "exceptionWrappers" => null,
            "data" =>  [
                "proProfileId" => 37,
                "user" => [
                    "userId" => 213,
                    "firstName" => "asdfasdf",
                    "lastName" => "asdf",
                    "password" => "92429d82a41e930486c6de5ebda9602d55c39986",
                    "workEmail" => "asdf@asdf.com",
                    "businessName" => null,
                    "category" => null,
                    "roleId" => 3,
                    "status" => false,
                    "userStatus" => null,
                    "forgotToken" => null,
                    "forgotTokenTime" => null,
                    "createdById" => null,
                    "modifiedById" => null,
                    "createdDate" => 1600734923000,
                    "modifiedDate" => 1600734923000
                ]
            ]
        ]);
        return response($response)
            ->header('Access-Control-Expose-Headers', 'X-Auth-Token, filename')
            ->header('Expires', 0)
            ->header('Pragma', 'no-cache')
            ->header('X-Auth-Token', 'lgauT75djc2NeCkowJsLMBhfBL8adNBx57V0ES3XAzE=');
    }
}
