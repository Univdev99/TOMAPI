<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProEducation;
use App\ProfessionalProfile;
use App\ProWorkAvailability;


class ProfessionalController extends Controller
{
    public function index() {
        $data = ProfessionalProfile::where('ProfessionalProfileId', 14)->first()->toArray();
        dd($data);
    }

    public function personalProfileGet(Request $request) {
        $info = $request->json()->get('proProfileId');
        $proProfile = ProfessionalProfile::where('ProfessionalProfileId', $info)->first()->toArray();
        return $this->result($proProfile);
    }

    public function personalProfileSave(Request $request) {
        $info = $request->json()->get('proPersonalProfile');
        return $this->result($info);
    }

    public function workAvailGet(Request $request) {
        //Show after login user as Pro

        $pro_file_id = $request->json()->get('PRO_PROFILE_ID');
        $proWork = ProWorkAvailability::where('professionalProfileId', $pro_file_id)->first();

        return $this->result($proWork);
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
        ])->toArray();
        return $this->result($proWork);
    }

    public function workExpGet() {
        $db = \DB::select("SELECT distinct SMT.masterSkillName,SMT.proSkillMasterId,SCT.categorySkillName,SCT.proSkillCategoryId,  SDT.detailSkillName,SDT.proSkillDetailId
        from HADMIN.ProSkillMasterTable SMT 
        LEFT JOIN HADMIN.ProSkillTable PST on PST.ProSkillMasterId = SMT.ProSkillMasterId
        LEFT JOIN HADMIN.ProSkillCategoryTable SCT on PST.ProSkillCategoryId = SCT.ProSkillCategoryId
        LEFT JOIN HADMIN.ProSkillDetailTable SDT on SDT.proSkillDetailId = PST.proSkillDetailId
        WHERE PST.proWorkExperienceId = proWorkExperienceId;");

        return $this->result($db);
    }

    public function workExpSave() {
        return $this->result("next");
    }

    public function treeGet() {
        $db = \DB::select("SELECT distinct SMT.masterSkillName,SMT.proSkillMasterId,SCT.categorySkillName,SCT.proSkillCategoryId,SDT.detailSkillName,SDT.proSkillDetailId
        from HADMIN.ProSkillMasterTable as SMT
        LEFT JOIN HADMIN.ProSkillCategoryTable as SCT on SCT.ProSkillMasterId = SMT.ProSkillMasterId
        LEFT JOIN HADMIN.ProSkillDetailTable AS SDT on SDT.ProSkillCategoryId = SCT.ProSkillCategoryId  AND  SMT.ProSkillMasterId = SDT.ProSkillMasterId
        ORDER BY MasterSkillName ,CategorySkillName, DetailSkillName;");

        return $this->result($db);
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

    public function result($data = null, $code = 200, $msg = null, $excep = null) {
        $response = [
            "apiCode" => $code,
            "message" => $msg,
            "exceptionWrappers" => $excep,
            "data" => $data
        ];

        return response()->json($response, 200, [], JSON_NUMERIC_CHECK)
            ->header('Access-Control-Expose-Headers', 'X-Auth-Token, filename')
            ->header('Expires', 0)
            ->header('Pragma', 'no-cache');
    }
}
