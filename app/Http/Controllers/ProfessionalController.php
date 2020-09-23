<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProEducation;
use App\ProWorkAvailability;


class ProfessionalController extends Controller
{
    public function index() {
        $data = ProEducation::all();
        dd($data);
    }

    public function personalProfileGet(Request $request) {
        $info = $request->json()->get('proProfileId');
        
    }

    public function personalProfileSave() {
        
    }

    public function workAvailGet(Request $request) {
        //Show after login user as Pro

        $pro_file_id = $request->json()->get('PRO_PROFILE_ID');
        $proWork = ProWorkAvailability::where('professionalProfileId', $pro_file_id)->first();

        $response = [
            "apiCode" => 200,
            "message" => "",
            "exceptionWrappers" => null,
            "data" => $proWork
        ];
        return response()->json($response)
            ->header('Access-Control-Expose-Headers', 'X-Auth-Token, filename')
            ->header('Expires', 0)
            ->header('Pragma', 'no-cache');
    }

    public function workAvailSave(Request $request) {

        $info = $request->json()->get('proWorkAvailability');
        $proWork = ProWorkAvailability::create([
            "StartDate" => $info["startDate"],
            "LastDate" => $info["lastDate"],
            "DateRange" => null,
            "WorkAvailability" => $info["workAvailability"],
            "LocationAvailability" => $info["locationAvailability"],
            "isFullTime" => $info["isFullTime"],
            "professionalProfileId" => $info['professionalProfileId']
        ]);
        $response = [
            "apiCode" => 200,
            "message" => "",
            "exceptionWrappers" => null,
            "data" => $proWork
        ];

        return response()->json($response)
            ->header('Access-Control-Expose-Headers', 'X-Auth-Token, filename')
            ->header('Expires', 0)
            ->header('Pragma', 'no-cache');
    }

    public function workExpGet() {

    }

    public function workExpSave() {

    }

    public function treeGet() {

    }

    public function search() {

    }

    public function getWholeProfile() {

    }

    public function jobGet() {

    }

    public function projectAccpeted() {

    }

    public function projectHistory() {

    }

    public function projectComplete() {

    }

    public function workExpWithSkill() {

    }
}
