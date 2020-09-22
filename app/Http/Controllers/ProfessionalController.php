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

    public function personalProfileGet() {
    
    }

    public function personalProfileSave() {
        
    }

    public function workAvailGet(Request $request) {
        //Show after login user as Pro

        $pro_file_id = $request->json()->get('PRO_PROFILE_ID');
        $proWork = ProWorkAvailability::where('professionalProfileId', $pro_file_id);

        
        $response = [
            "apiCode" => 200,
            "message" => "",
            "exceptionWrappers" => null,
            "data" => $proWork->first()
        ];
        return response()->json($response)
            ->header('Access-Control-Expose-Headers', 'X-Auth-Token, filename')
            ->header('Expires', 0)
            ->header('Pragma', 'no-cache');
    }

    public function workAvailSave(Request $request) {

        $proWorkAvail = $request->json();
        $pro_file_id = $request->json()->get('proWorkAvailability')['professionalProfileId'];

        $response = [
            "apiCode" => 200,
            "message" => "",
            "exceptionWrappers" => null,
            "data" => [
                "proWorkAvailabilityId" => 50,
                "startDate" => null,
                "lastDate" => null,
                "dateRange" => null,
                "workAvailability" => null,
                "locationAvailability" => null,
                "isFullTime" => null,
                "professionalProfileId" => 42
            ]   
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
