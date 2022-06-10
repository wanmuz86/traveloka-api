<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityController extends Controller
{
    //

    public function create(Request $request){
        $facility = new Facility();
        $facility->name = $request->name;
        $facility->save();
        return response()->json([
            "status"=>"ok",
            "data"=>$facility
        ]);

    }
    public function index(Request $request){
        $facilities = Facility::all(['name','id']);
        return response()->json([
            "status"=>"ok",
            "data"=>$facilities
        ]);
    }

    public function getHotels($facility_id){
        $facility = Facility::find($facility_id);
        return response()->json([
            "status"=>"ok",
            "data"=>$facility->hotels
        ]);
    }
}
