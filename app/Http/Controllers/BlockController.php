<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Block;
use App\Hostel;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostels = Hostel:: all();
        $blocks = Block:: all();
       return view('blocks.index', compact('hostels','blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hostels = Hostel:: all();
        $blocks = Block:: all();
        return view('blocks.create', compact('hostels','blocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 1;
        // dd($request);
        $this -> validate($request, [
            'hostel_id' => 'required',
            'number' => 'required',
            'name' => 'required',
            'room_capacity' => 'required',
        ]);

        Block::create([
            'hostel_id' => $request->input('hostel_id'),
            'number' => $request->input('number'),
            'name' => $request->input('name'),
            'room_capacity' => $request->input('room_capacity'),
        ]);

        return redirect()->route('blocks.index')
                            ->with('success',
                            'New Block is created succesful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $block = block::findOrFail($id);
        return view('blocks.show', compact('block'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $block = block::findOrFail($id);
        return view('blocks.edit', compact('block'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $block = block::findOrFail($id);
        $this -> validate($request, [
            'hostel_id' => 'required',
            'number' => 'required',
            'name' => ['required', 'string', 'max:20', 'unique:blocks,name'],
            'room_capacity' => 'required',
        ]);

        $block->update([
            'hostel_id' => $request->input('hostel_id'),
            'number' => $request->input('number'),
            'name' => $request->input('name'),
            'room_capacity' => $request->input('room_capacity'),
        ]);

        return redirect()->route('blocks.index')
                            ->with('success',
                            'Block details updated succesful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = block::findOrFail($id);
        $block->delete();
        return redirect()->route('blocks.index')
                            ->with('success',
                            'Block deleted succesful.');

    }
}
