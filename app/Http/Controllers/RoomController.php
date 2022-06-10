<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
class RoomController extends Controller
{
    //

    public function create($hotel_id, Request $request){
        $room = new Room();
        $room->name = $request->name;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->pic_url = $request->pic_url;
        $room->availability = 1;
        $room->hotel_id = $hotel_id;
        $room->save();
        return response()->json([
            "status"=>"ok",
            "data"=>$room
        ]);
    }

    public function index($id){
        $rooms = Room::where('hotel_id',$hotel_id)->get();
        return response()->json([
            "status"=>"ok",
            "data"=>$rooms
        ]);

    }

    public function get($hotel_id, $room_id){
        // findId() -> get One item , which has the id given => {} ->Object
        // all() -> get All Item, one or many, =>[] Array
        // get() -> get one or many -> [] Array
        // first() -> getOne -> {} Object
        $room = Room::where('hotel_id',$hotel_id)->where('id',$room_id)->first(['id','name','description','price','pic_url']);
        return response()->json([
            "status"=>"ok",
            "data"=>$room
        ]);

    }
    public function update($hotel_id, $room_id, Request $request){
        $room = Room::where('hotel_id',$hotel_id)->where('id',$room_id)->first();
        $room->update($request->all());
        return response()->json([
            "status"=>"ok",
            "data"=>$room
        ]);
    }

    public function delete($hotel_id, $room_id){
        $room = Room::find($id);
        $room->delete();
        return response()->json([
            "status"=>"ok"
        ]);
    }
}
