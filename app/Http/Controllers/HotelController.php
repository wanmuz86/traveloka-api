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
        // Create a many to many relationship in facilities
        $newhotel->facilities()->attach($request->facilities);
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
        if ($request->facilities){
            // Buang facilities lama lama
            $hotel->facilities()->detach();
            $hotel->facilities()->attach($request->facilities);
        }
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

    public function hotelCheapRoom(Request $request){
        $minPrice = 150;
        if ($request->input('price')){
            $minPrice = $request->input('price');
        }

        $hotels = Hotel::with(['rooms' => function ($query) use ($minPrice){
            // Query di dalam rooms/ relation
            $query->where('price','<',$minPrice );
        }])->get();
        return response()->json([
            'status'=>true,
            "data"=>$hotels
        ]);
    }
}
