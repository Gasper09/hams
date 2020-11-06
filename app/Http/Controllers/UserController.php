<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

use App\User;

class UserController extends Controller
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
        $this -> authorize('UpdateInfo');
        $roles = Role::where('name', '!=', 'student')->get();
        $users = User::all();
        return view('users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this -> authorize('UpdateInfo');
        $roles = Role::where('name', '!=', 'student')->get();
        return view('users.create',compact('roles') );
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
            'name'          => ['required', 'string', 'max:255'],
            'role'          => ['required', 'string', 'max:255'],
            'phone_number'  => ['nullable'],
            'email'         => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        User::create([
            'name'          => ($request->name),
            'phone_number'  => $request->phone_number,
            'email'         => $request->email, 
            'password' => Hash::make($request['password']), 
        ])->assignRole($request->role);

        return redirect()->route('users.index')->with('success',
        'User is created succesfully!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this -> authorize('UpdateInfo');
        $roles = Role::all();
        $user  = User::findOrFail($id);
        return view('users.show',compact('user','roles') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this -> authorize('UpdateInfo');
        $roles = Role::all();
        $user  = User::findOrFail($id);
        return view('users.edit',compact('user','roles') );
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
        $this -> authorize('UpdateInfo');
        $roles = Role::all();
        $user  = User::findOrFail($id);
        $this->validate($request, [
            'name'          => ['required', 'string', 'max:255'],
            'role'          => ['required', 'string', 'max:255'],
            'phone_number'  => ['nullable',],
            'email'         => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user->update([
            'name'          => ($request->name),
            'phone_number'  => $request->phone_number,
            'email'         => $request->email, 
            'password' => Hash::make($request['password']), 
        ])->assignRole($request->role);

        return redirect()->route('users.index')->with('success',
        'User is updated succesfully!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        $this -> authorize('UpdateInfo');
        $user  = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Your user is deleted succesfully!.');;
    }
}
