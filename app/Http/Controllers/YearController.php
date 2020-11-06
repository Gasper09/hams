<?php

namespace App\Http\Controllers;

use App\year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::all();
        return view('yearSetting.index', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = Year::all();
        return view('yearSetting.create', compact('years'));
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
            'year' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        Year::create([
            'name' => $request->input('year'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);

        return redirect()->route('yearSetting.index')
                            ->with('success',
                            'New Year is created succesful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $year = Year::findOrFail($id);
        return view('yearSetting.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $year = Year::findOrFail($id);
        $this ->validate($request, [
            'year' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        $year->update([
            'name' => $request->input('year'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);

        return redirect()->route('yearSetting.index')
                            ->with('success',
                            'Year is set succesful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy(year $year)
    {
        //
    }
}
