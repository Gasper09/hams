<?php

namespace App\Http\Controllers;

use App\Hostel;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostels = Hostel::all();
        return view('hostels.index', ['hostels'=>$hostels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hostels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       $this ->validate($request, [
               'name' => 'required',
               'blocks_capacity' => 'required'
       ]);

       Hostel::create([
           'name' => $request->input('name'),
           'blocks_capacity' => $request->input('blocks_capacity'),
       ]);

       return redirect()->route('hostels.index')
                            ->with('success',
                            'New Hostel is created succesful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hostel = Hostel::findOrFail($id);
        return view('hostels.show', compact('hostel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hostel = Hostel::findOrFail($id);
        return view('hostels.edit', compact('hostel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hostel = Hostel::findOrFail($id);
        $this ->validate($request, [
            'name' => 'required',
            'blocks_capacity' => 'required'
    ]);

    $hostel -> update([
        'name' => $request->input('name'),
        'blocks_capacity' => $request->input('blocks_capacity'),
    ]);
        return redirect()->route('hostels.index')
                            ->with('success',
                            'Hostel details updated succesfully!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hostel = Hostel::findOrFail($id);
        $hostel->delete();
        return redirect()->route('hostels.index')
                            ->with('success',
                            'Hostel deleted succesful.');
    }
}
