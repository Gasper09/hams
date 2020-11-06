<?php

namespace App\Http\Controllers;

use App\StudentRequest;
use App\Student;
use Illuminate\Http\Request;
use DB;

class StudentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentRequest = StudentRequest::all();
        $students = Student::all();
        return view('reports.index', compact('students','studentRequest'));
    }

    public function accepted()
    {
        $studentRequest = StudentRequest::all();
        $students = Student::all();
        $acceptedRequests = StudentRequest::active()->orderBy('level')->get();
        
        return view('reports.accepted', compact('students','studentRequest','acceptedRequests'));
    }

    public function rejected()
    {
        $studentRequest = StudentRequest::all();
        $students = Student::all();
        $rejectedRequests = StudentRequest::inactive()->get();

        return view('reports.rejected', compact('students','rejectedRequests','studentRequest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth()->user()->student->id;
        $reqIn = DB::table('student_requests AS t1')
          ->select('t1.student_id')
          ->where('t1.student_id', '=', $id)->get();
 
        if(count($reqIn)){
         return redirect()->back()->with('success','You allready sent a request before please wait your request process');
        }
        else{

            $studentRequest = StudentRequest::all();
            $students = Student::all();
            return view('requests.create', compact('students','studentRequest'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $students = Student::all();

        $this->validate($request, [
            'student_id' => ['required'],
            'level' => ['required'],
        ]);

       // dd($request->student_id);

         $student_ids = Auth()->user()->student->id;

        StudentRequest::create([
           'student_id' => $student_ids,
           'level' => $request['level'],
        ]);

        $msg ='Your request is sent and is in process...!';

        return redirect()->route('students.index', compact('msg'))->with('success',
        'Your request is sent succesfully!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentRequest  $studentRequest
     * @return \Illuminate\Http\Response
     */
    public function show(StudentRequest $studentRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentRequest  $studentRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentRequest $studentRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentRequest  $studentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ids = $request->id[0];

     dd($ids[]);
        $students = Student::all();
        $studentRequest = StudentRequest::findOrFail($id);
        // $this->validate($request, [
        //     'status[]' => ['required'],
        // ]);

        $studentRequest -> update([
            // 'student_id' => $request['student_id'],
            // 'level' => $request['level'],
            //'status' => $request -> get('status'),
          'status' => $request->status[0],
         ]);

         dd($studentRequest->status);

        return redirect()->route('requests.index')->with('success',
        'The request is changed succesfully!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentRequest  $studentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentRequest $studentRequest)
    {
        //
    }
}
