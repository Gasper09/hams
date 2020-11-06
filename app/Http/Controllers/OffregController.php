<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Gender;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use App\User;
use App\StudentRequest;
use DB;

class OffregController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offregs.create', [
            'genders' => Gender::all(),
            'roles' => Role::where('name', '=', 'student')->get(),
             ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    => ['required', 'string', 'max:255'],
            'reg_no'    => ['required', 'string', 'max:255'],
            'role'          => ['required', 'string', 'max:255'],
            'phone_number'  => ['nullable'],
            'sponsor'    => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender_id'    => ['required', 'string', 'max:255'],
            'disability'    => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
            ]);
            
            $user = User::create([
                'name'    => title_case($request->name),
                'phone_number'  => $request->phone_number,
                'email'  => $request->email,
                'password' => Hash::make($request['password']), 
                ])->assignRole($request->role);
                
                if ($request->role == 'Student') {  

            $user->student()->create([
                        'user_id' => $user->id,
                        'reg_no'  => $request->reg_no,
                        'sponsor'  => $request->sponsor,
                        'gender_id'  => $request->gender_id,
                        'disability'  => $request->disability,
                        ]);
                         } 

            if($request->image){
                $images = now()->format('Ymdhis') . rand(1000, 9999) . '.' . $request->image->extension();
                if ($request->hasFile('image')) {
                    $stored = $request->image->storeAs('public/attachments', $images);

                    $user->student()->update([
                        'image_path' => 'storage/attachments/'.$images,
                    ]);
                }
                else{
                    return redirect()->back()->with('success',
                    'Oopss! it seems that your file atachment is wrong, please try again.');
                }
            }
        return redirect()->route('login')->with('success',
        'Your created succesfully!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
