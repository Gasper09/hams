<?php

namespace App\Http\Controllers;

use App\Student;
use App\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use App\User;
use App\StudentRequest;
use DB;
// use App\Role;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            $students = Student::all();
            $gender = Gender::all();
            $msg ='';
            $msg0='';
            $msg1='';
            $msg2='';
            $studentRequest='';
        }
        else{
            $studentss = DB::table('students AS t1')
            ->select('t1.user_id','t1.gender_id','t1.id','t1.reg_no')
            ->leftJoin('users AS t2', 't2.id','=','t1.user_id')
            ->where('t1.user_id','=',auth()->id())
            ->get();

        $id = Auth()->user()->student->id;
        $reqIn = DB::table('student_requests AS t1')
          ->select('t1.student_id')
          ->where('t1.student_id', '=', $id)->get();

          if(count($reqIn)){
              $msg ='Your request is sent and is in process...!';
              $msg0 ='Request pending';
          }
          else{
             $msg ='you can request accomodation if you want.!';
             $msg0 ='Your dont have any request';
          }

          $reqAc = DB::table('student_requests AS t1')
          ->select('t1.student_id', 't1.status')
          ->where('t1.student_id', '=', $id,)
          ->where( 't1.status','=', 1)
          ->get();

          if(count($reqAc)){
            $msg1 ='Your request is accepted so wait to be allocated...!';
          }
          else{
            $msg1 ='please wait your request to be confirmed..!';
          }

          $reqAl = DB::table('allocations AS t1')
          ->select('t1.student_id')
          ->where('t1.student_id', '=', $id)->get();

          if(count($reqAl)){
            $msg2 ='Your allocated...!';
            $msg1 ='Done!';
            $msg0 = 'Done!';
            $msg = 'Done!';
          }
          else{
            $msg2 ='please wait to be allocated..!';
          }


            $studentRequest = StudentRequest::all();
            //dd($studentRequest);
            $students = Student::where('user_id' , auth()->id())->get();
            $gender = Gender::all();
        }
        //dd($students);
        return view('students.index', compact('students','gender','msg','msg1','msg2','msg0','studentRequest'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = Role::where('name', '=', 'student')->get();
        return view('students.create', [
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
        //dd($request->sponsor);
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
        return redirect()->route('students.index')->with('success',
        'Your created succesfully!.');
    }

    public function offline(Request $request){
        
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
        return redirect()->route('students.index')->with('success',
        'Your created succesfully!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this -> authorize('UpdateInfo');
        $roles = Role::all();
        $student  = Student::findOrFail($id);
        return view('students.show',compact('student','roles') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this -> authorize('UpdateInfo');
        $genders = Gender::all();
        $roles = Role::all();
        $student  = Student::findOrFail($id);
        return view('students.edit',compact('student','roles','genders') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                //dd($request->sponsor);

                $this -> authorize('UpdateInfo');
                $student  = Student::findOrFail($id);
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
                    
                    $user ->update([
                        'name'    => title_case($request->name),
                        'phone_number'  => $request->phone_number,
                        'email'  => $request->email,
                        'password' => Hash::make($request['password']), 
                        ])->assignRole($request->role);
                        
                        if ($request->role == 'Student') {  
        
                    $user->student()->update([
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
                return redirect()->route('students.index')->with('success',
                'Your created succesfully!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
