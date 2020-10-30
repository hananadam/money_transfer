<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App;
use Session;

class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {           
        return true;
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Room = new App\Room();
        $room = $Room->reportRoom();


        //$features = Auth::user()->load('user_permission')->user_permission()->pluck('feature_id')->toArray();

        // if(in_array(11, $features))
        // {
        //       return view('buidling.buidling_report', [
        //         'data' => $buidlinges, 
        //         'urls' => array()
        //     ]);
        // }
        $urls=array();
        $allPerms=auth()->user()->getAllPermissions();
        foreach($allPerms as $permission) {
            if ('create room' == $permission->name) {
                $urls=array_fill_keys(array('add'),url('/displayAddRoom'));
            }
             if ('edit room' == $permission->name) {
                $urls=array_fill_keys(array('update'),url('/displayUpdRoom'));
            }
            if ('delete room' == $permission->name) {
                $urls+=array_fill_keys(array('delete'),url('/deleteRoom'));
            }
        } 
        return view('room.room_report', [
            'data' => $room, 
            'urls' => $urls
        ]);   
    }

    public function viewAddRoom()
    {
        $Campus = new App\Campus();
        $campuses = $Campus->getCampus();

        $Building = new App\Building();
        $building = $Building->getBuilding();

        $RoomType = new App\RoomType();
        $room_type = $RoomType->getRoomType();

        return view('room.room', [
            'campuses' => $campuses,
            'building' => $building,
            'room_type' => $room_type   
        ]);   
    }

    public function viewUpdRoom($room_code)
    {
        $Room = new App\Room();
        $room = $Room->getRoom($room_code);

        $Campus = new App\Campus();
        $campuses = $Campus->getCampus();

        $Building = new App\Building();
        $building = $Building->getBuilding();

        $RoomType = new App\RoomType();
        $room_type = $RoomType->getRoomType();

        return view('room.room_update', [
            'data' => $room[0],
            'campuses' => $campuses,
            'building' => $building,
            'room_type' => $room_type

        ]);
    }

    public function createRoom(Request $request)
    {
        $validated = $this->dataValidator($request->all(), [

            'campus_code' => 'required',
            'building_code' => 'required',
            'room_name' => 'required|string|max:255',
        ]);
        if($validated['result'] == 'fail')
            return json_encode($validated['errors']);

        $data = $request->all();
        $Room = new App\Room();
        $saved = $Room->createRoom($data);
        if ($saved)
            return redirect('/room');

    }

    public function updateRoom(Request $request)
    {
        $data = $request->all();

        $Room = new App\Room();
        $saved = $Room->updateRoom($data);
        if ($saved)
            return redirect('/room');

    }

    public function deleteRoom($room_code)
    {   
        $Room = new App\Room();
        $Room->deleteRoom($room_code);

        return redirect('/room');
    }
}
