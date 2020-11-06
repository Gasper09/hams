<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Room;

use App\Block;
use App\Hostel;
use DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $hostels = DB::table('blocks')->groupBy('name')->get();
        
        return view('rooms.index',['hostels'=> $hostels, 'rooms'=>$rooms]);
    }

    function fetch(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DB::table('blocks')->where($select, $value)->groupBy($dependent)->get();

        $output = '<option value=""> select' .ucfirst($dependent). '</option>';

        foreach($data as $row){

            $output .='<option value=" '.$row->$dependent.' ">'
                     .$row->$dependent. '</option>';

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this -> authorize('UpdateInfo');
        // $hostels = DB::table('blocks')->groupBy('hostel_id')->get();
        $blocks = DB::table('blocks')->get();
        
        return view('rooms.create',['blocks'=> $blocks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> authorize('UpdateInfo');
        $this->validate($request, [
            'block_id' => 'required',
            'number' => 'required',
            'bed_capacity' => 'required'

        ]);

        Room::create([
            'block_id' => $request['block_id'],
            'number' => $request['number'],
            'bed_capacity' => $request['bed_capacity'],
        ]);

        return redirect()->route('rooms.index')
                         ->with('success','Room is created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this -> authorize('UpdateInfo');
        $blocks = DB::table('blocks')->get();

        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room','blocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> authorize('UpdateInfo');
        $room = Room::findOrFail($id);
        $this->validate($request, [
            'block_id' => 'required',
            'number' => 'required',
            'bed_capacity' => 'required'

        ]);

        $room->update([
            'block_id' => $request['block_id'],
            'number' => $request['number'],
            'bed_capacity' => $request['bed_capacity'],
        ]);

        return redirect()->route('rooms.index')
                          ->with('success','Room detail is updated successful'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> authorize('UpdateInfo');
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('rooms.index')
                          ->with('success','Room is deleted successful'); 

    }
}
