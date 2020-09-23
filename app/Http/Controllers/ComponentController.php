<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Province;

class ComponentController extends Controller
{
    public function softSearch(Request $request) {
        
        $params = $request->json();
        $array = [];
        if(count($params) < 2) {
            $response = [
                "apiCode" => 400,
                "message" => "Required parameters are missing",
                "exceptionWrappers" => null,
                "data" => null
            ];
        } else {
            $addressType = $params->get('componentName');
            $searchParam = strtolower($params->get('searchParam'));
            
            if($addressType == "allCity") {
                $cityList = City::all()->pluck('cityName', 'cityId');
                foreach($cityList as $id => $city) {
                    if(strpos(strtolower($city), $searchParam) !== false){
                        $array[] = [
                            'value' => $id,
                            'label' => $city
                        ];
                    }
                }
            } else if($addressType == "allProvince") {
                $staticWhereClause = $params->get('staticWhereClause');
                $provinceList = Province::all()->pluck('provinceName', 'provinceId');
                foreach($provinceList as $id => $province) {
                    if(strpos(strtolower($province), $searchParam) !== false){
                        $array[] = [
                            'value' => $id,
                            'label' => $province
                        ];
                    }
                }
            }
            $response = [
                "apiCode" => 201,
                "message" => null,
                "exceptionWrappers" => null,
                "data" => $array
            ];
        }        
        return response()->json($response);
    }
}