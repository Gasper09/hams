<?php

namespace App\Http\Controllers;

use App\annoucement;
use Illuminate\Http\Request;

class AnnoucementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('UpdateInfo');
        $annoucements = Annoucement::all();
        return view('annoucements.index', \compact('annoucements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('UpdateInfo');
        return view('annoucements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('UpdateInfo');
       $this->validate($request, [
            'title' => ['required'],
            'body' => ['required'],
        ]);

        //dd($request->title);
       $annoucement = Annoucement::create([
            'title' => $request['title'],
            'body' => $request['body'],
            ]);

        if($request->file){
            $images = now()->format('Ymdhis') . rand(1000, 9999) . '.' . $request->file->extension();
            if ($request->hasFile('file')) {
                $stored = $request->file->storeAs('public/attachments', $images);
            }
            $annoucement ->update([
                'file' => 'storage/attachments/'.$images,
            ]);
        }

            
         return redirect()->route('annoucements.index')->with('success',
         'Your annoucement is sent succesfully!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\annoucement  $annoucement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annoucement = Annoucement::findOrFail($id);

        return view('annoucements.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\annoucement  $annoucement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('UpdateInfo');
        $annoucement = Annoucement::findOrFail($id);
        return view('annoucements.edit', compact('annoucement'));
                          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\annoucement  $annoucement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('UpdateInfo');
        $this->validate($request, [
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $annoucement = Annoucement::findOrFail($id);
        if($request->file){
            $images = now()->format('Ymdhis') . rand(1000, 9999) . '.' . $request->file->extension();
            if ($request->hasFile('file')) {
                $stored = $request->file->storeAs('public/attachments', $images);
            }
        }

        $annoucement->update([
            'file' => 'storage/attachments/'.$images,
            'title' => $request['title'],
            'body' => $request['body'],
         ]);
        return redirect()->route('annoucements.index')
                          ->with('success','Annoucement is updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\annoucement  $annoucement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('UpdateInfo');
        $annoucement = Annoucement::findOrFail($id);
        $annoucement->delete();

        return redirect()->route('annoucements.index')
                          ->with('success','Annoucement is deleted successful');
    }
}
