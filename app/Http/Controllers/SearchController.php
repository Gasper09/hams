<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('UpdateInfo');
        $q = $request->input('q');
        $students = Student::all();

        //dd($st);
        $users = User::where('name','LIKE','%'.$q.'%')
              ->orWhere('email','LIKE','%'.$q.'%')
              ->orWhere('phone_number','LIKE','%'.$q.'%')
              ->paginate(15);

              //$studentsPagination = $students->paginate(15);

        if(count( $users)>0){
        return view('users.index', compact('users','students'))->withDetails($users)->withQuery($q);
    }
        else{
        return redirect()->back()->with('success','No result found. please try!');
    }
    }
}
