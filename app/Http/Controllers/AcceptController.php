<?php

namespace App\Http\Controllers;

use DB;
use App\StudentRequest;

use Illuminate\Http\Request;

class AcceptController extends Controller
{
    public function accept(Request $request){

        //return 1;
       // $ids = $request->id;
        //dd($ids);
       // $status = $request->status;
        //dd($status);
        // DB::table('student_requests')->whereIn('id', $ids)
        // ->update(array(['status' => $status,]));
        // dd($status);

        if ($request->status && $request->id) {
            
            foreach($request->id as $key=>$value){
                $student_requests = StudentRequest::find($request->id[$key]);
                $student_requests->status = $request->status[$key];
                $student_requests->save();
            }
            return redirect()->route('requests.index')->with('success',
            'The request is accepted succesfully!.');
        

      }

       else{
            return redirect()->route('requests.index')->with('error',
             'Please select user and then accept request!');
        }
    

    }

    public function reject(Request $request){

        if ($request->status && $request->id) {
            
            foreach($request->id as $key=>$value){
                $student_requests = StudentRequest::find($request->id[$key]);
                $student_requests->status = $request->status[$key];
                $student_requests->save();
            }
            return redirect()->route('acceptedRequest.accepted')->with('success',
            'The request is accepted succesfully!.');
        

      }

       else{
            return redirect()->route('acceptedRequest.accepted')->with('error',
             'Please select user and then accept request!');
        }
    

    }
}
