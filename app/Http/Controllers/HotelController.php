<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
   
    public function create(Request $request){
        $newhotel = new Hotel();
        $newhotel->name = $request->name;
        $newhotel->description  = $request->description;
        $newhotel->address  = $request->address;
        $newhotel->email = $request->email;
        $newhotel->phone = $request->phone;
        $newhotel->pic_url = $request->pic_url;
        $newhotel->policy = $request->policy;
        $newhotel->save();
        return response()->json([
            'status'=>true,
            'data'=>$newhotel
        ]);

    }

    public function index(){
        $hotels = Hotel::all();
        return response()->json([
            'status'=>true,
            'data'=>$hotels
        ]);
    }
    public function get($id){
        $hotel = Hotel::with('reviews','facilities','rooms')->find($id);
        return response()->json([
            'status'=>true,
            'data'=>$hotel
        ]);
    }

    public function update($id,Request $request){
        $hotel = Hotel::find($id);
        $hotel->update($request->all());
        return response()->json([
            'status'=>true,
            'data'=>$hotel
        ]);
    }

    public function delete($id){
        $hotel = Hotel::find($id);
        $hotel->delete();
        return response()->json([
            'status'=>true,
            "message"=>"Succesfully deleted"
        ]);
    }
}
