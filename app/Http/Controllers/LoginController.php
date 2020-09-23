<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\FirmProfile;
use App\ProfessionalProfile;

class LoginController extends Controller
{
    public function index(Request $request) {

        $email = $request->json()->get('username');
        $pwd = $request->json()->get('password');

        $user = User::where('workEmail', $email)->first();
        $data = null;
        if($user->roleId == env('FIRM_USER_TYPE')) {
            $profile = FirmProfile::where('UserId', $user->userId)->first();
            $data = [
                "user" => $user,
                "firmProfile" => $profile
            ];
             
        } else if($user->roleId == env('PRO_USER_TYPE')) {
            $profile = ProfessionalProfile::where('UserId', $user->userId)->first();
            $data = [
                "user" => $user,
                "PRO_PERSONAL_PROFILE" => $profile
            ];
        }
       
        $response = [
            "apiCode" => 200,
            "message" => "",
            "exceptionWrappers" => null,
            "data" => $data
        ];
        return response()->json($response, 200, [], JSON_NUMERIC_CHECK)
            ->header('Access-Control-Expose-Headers', 'X-Auth-Token, filename')
            ->header('Expires', 0)
            ->header('Pragma', 'no-cache')
            ->header('X-Auth-Token', 'lgauT75djc2NeCkowJsLMBhfBL8adNBx57V0ES3XAzE=');
    }
}
