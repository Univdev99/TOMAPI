<?php

namespace App\Http\Controllers;

use App\FirmProfile;
use App\ProfessionalProfile;
use App\User;
use Illuminate\Http\Request;
use Config;

class RegisterController extends Controller
{
    
    public function register(Request $request) {
        $info = $request->json()->get('user');
        $roleId = $info['roleId'];
        $user = User::updateOrCreate(['workEmail' => $info['workEmail']],[
            'firstName' => $info['firstName'],
            'lastName' => $info['lastName'],
            'password' => md5($info['password']),
            'roleId' => $info['roleId']
        ]);
        $data = null;
        if($roleId == config('constant.FIRM_USER_TYPE')) {
            $firm = FirmProfile::updateOrCreate(['UserId' => $user->id,], [
                'FirstName' => $info['firstName'],
                'LastName' => $info['lastName'],
                'WorkEmail' => $info['workEmail'],
                'BusinessName' => $info['businessName']
            ]);
            $data = [
                "firmProfileId" => $firm->id,
                "user" => $user
            ];
        } else if ($roleId == config('constant.PRO_USER_TYPE')) {
            $pro = ProfessionalProfile::updateOrCreate(['UserId' => $user->id], [
                'FirstName' => $info['firstName'],
                'LastName' => $info['lastName']
            ]);
            $data = [
                "proProfileId" => $pro->id,
                "user" => $user
            ];
        }
        $response = json_encode([
            "apiCode"  =>  200,
            "message"  =>  "User saved successfully",
            "exceptionWrappers" => null,
            "data" =>  $data
        ]);
        return response($response)
            ->header('Access-Control-Expose-Headers', 'X-Auth-Token, filename')
            ->header('Expires', 0)
            ->header('Pragma', 'no-cache')
            ->header('X-Auth-Token', 'lgauT75djc2NeCkowJsLMBhfBL8adNBx57V0ES3XAzE=');
    }
}
