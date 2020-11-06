<?php

namespace App\Http\Controllers;

use App\Bed;
use App\Room;
use Illuminate\Http\Request;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $beds = Bed::all();

        return view('beds.index', compact('rooms','beds'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this -> authorize('UpdateInfo');
        $rooms = Room::all();
        $beds = Bed::all();

        return view('beds.create', compact('rooms','beds'));
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
            // 'room_id' => 'required',
            'number' => 'required',
            'student_capacity' => 'required',
        ]);

        

        Bed::create([
            //'room_id' => $request['room_id'],
            'number' => $request['number'],
            'student_capacity' => $request['student_capacity'],
        ]);
        

        return redirect()->route('beds.index')
                            ->with('success',
                            'Bed is created succesful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bed = Bed::findOrFail($id);
        return view('beds.create', compact('beds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this -> authorize('UpdateInfo');
        $bed = Bed::findOrFail($id);
        return view('beds.create', compact('bed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> authorize('UpdateInfo');
        $bed = Bed::findOrFail($id);
        $this->validate($request, [
            'room_id' => 'required',
            'number' => 'required',
            'student_capacity' => 'required',
        ]);

        $bed->update([
            'room_id' => $request['room_id'],
            'number' => $request['number'],
            'student_capacity' => $request['student_capacity'],
        ]);
        return redirect()->route('beds.index')
                            ->with('success',
                            'Bed details updated succesful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> authorize('UpdateInfo');
        $bed = Bed::findOrFail($id);
        $bed->delete();
        return redirect()->route('beds.index')
                            ->with('success',
                            'Bed deleted succesful.');
    }
}
