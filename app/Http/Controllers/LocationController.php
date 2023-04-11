<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Location;

class LocationController extends Controller
{
    public function getUpazillaList(Request $request){

        $location=$request->input('district');
        $upazillaLists=Location::WHERE('District',"$location")->pluck('Upazilla');
        return response()->json(['upazillaList' => $upazillaLists]);

    }

    public function getDistrictList(Request $request){

        $location=$request->input('division');
        $districtLists=Location::WHERE('division',"$location")->pluck('District');
        $districtListUnique=$districtLists->unique()->values();
        return response()->json(['districtLists' => $districtListUnique]);

    }

    public function getDivision(Request $request){


        $divisionList=Location::pluck('Division');
        $divisionListUnique=$divisionList->unique()->values();
        return response()->json(['divisionList' => $divisionListUnique]);

    }

    public function getUpazillaMapid(Request $request){


        $locationUpazilla=$request->input('upazilla');
        $locationDistrict=$request->input('district');
        $locationDivision=$request->input('division');
        $distUpazillaMapid=Location::WHERE('division',"$locationDivision")
        ->WHERE('district',"$locationDistrict")
        ->WHERE('upazilla',"$locationUpazilla")
        ->pluck('id');
        return response()->json(['upazillaMapId' => $distUpazillaMapid]);

    }

    public function getIDMapUpazillaDistrictDivision(Request $request){


        $locationID=$request->input('id');
        $IDMapUpazillaDistrictDivision=Location::WHERE('id',"$locationID")
        ->Select('id','Upazilla','District','Division')->get();
        return response()->json(['IDMapUpazillaDistrictDivision' => $IDMapUpazillaDistrictDivision]);

    }


}
