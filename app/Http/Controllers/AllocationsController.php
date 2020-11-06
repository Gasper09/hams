<?php

namespace App\Http\Controllers;
use DB;
use App\allocations;
use App\Room;
use App\Bed;
use App\Year;
use App\Student;
use App\StudentRequest;
use Illuminate\Http\Request;

class AllocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('UpdateInfo');
        $allocations = allocations::all();
        $studentRequest = StudentRequest::all();
        $rooms = Room::all();
        $beds = Bed::all();
        $room = Room::with('allocation')->get();
       // dd($rooms);
       
        // $unAllocated = DB::table( 'students As t1' )
        //         ->select('t1.id')
        //         ->leftJoin('allocations As t2', 't2.student_id', '=', 't1.id')
        //         ->whereNull('t2.student_id')->get();

    //  if (auth()->user()->hasRole('admin')) {
    //     $users = User::all();
    //     $loanAllocations = LoanAllocation::all();
    // } else {
    //     $loanAllocations = LoanAllocation::where('user_id', auth()->id())->get();
    //     $users = User::where('id', auth()->id())->get();
    //}
   //  return $users;

        $unAllocated = DB::table( 'student_requests As t1' )
        ->select('t1.student_id')
        ->leftJoin('allocations As t2', 't2.student_id', '=', 't1.student_id')
        ->whereNull('t2.student_id')
        ->where('t1.status','=','1')->get();
        //dd($unAllocated);
       // $acceptedRequests = $accepted->active()->get();

       $emptyRoom1 = DB::table('rooms AS t1')
       ->select('t1.id','t1.number','t1.block_id')
       ->leftJoin('allocations AS t2', 't2.room_id', '=', 't1.id')
       ->whereNull('t2.room_id')->get();
      //dd($emptyRoom1);

       if(count($emptyRoom1) > 0){
       $emptyRoom = $emptyRoom1;
    
       
       $years = Year::all();
       $acceptedRequests = StudentRequest::active()->get();

      // $RequiredToLocate = $acceptedRequests->where($acceptedRequests[1]->student_id,'=',$unAllocated[0]->student_id);
       //dd($RequiredToLocate);

       //for($i=0; $i<count($unAllocated); $i++){
       //->where($acceptedRequests[$i],'=', $unAllocated[$i])->get();
    //}
       //dd($acceptedRequests);
       
        return view('allocations.index', compact('years','unAllocated','allocations',
                    'rooms','room','emptyRoom','acceptedRequests','studentRequest','beds'));
    }else
    {
        return redirect()->route('allocations.allocated')->with('success',
         'No room available, please add a room! to allocate students.');
    }
    }

    public function allocated(){
        $years = Year::all();
        $allocation = allocations::all();
        $studentRequest = StudentRequest::all();
        
        return view('allocations.allocated', compact('allocation','years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->room_id);
        //$student_ids = $request->student_id;
        
        //dd($room_xs);
        if ($request->student_id && $request->bed_id && $request->year_id && $request->room_id) {

            $year_id = $request->year_id;
            $student_ids = $request->student_id;
            $room_xs = $request->room_id;
            $bed_xs = $request->bed_id;

            if (isset($bed_xs)) {

                $bed_ids = [];
                foreach ($bed_xs as $bed_x) {
                    $bed_ids[] =[
                        'bed_ids' => $bed_x,
                    ];
                }

            }

            if (isset($room_xs)) {

             $room_ids = [];
             foreach ($room_xs as $room_x) {
                 $room_ids[] =[
                     'room_ids' => $room_x,
                 ];
             }

         }
            
            $data = [];

            //for($i=0; $i<count($room_ids); $i++){
                $data[] = [
                    'year_idd' => $year_id,
                    'student_idd' => $student_ids,
                    'room_idd' => $room_ids,
                    'bed_idd' => $bed_ids, 
                    ] ; 

               // }
                    //dd(count($student_ids));
                  // dd($data[0]['student_idd'][1]);
                   //dd($data[0]['bed_idd'][0]['bed_ids'][0]);
            $data1 = [];  
  
            for($i=0; $i<count($student_ids); $i++){
                $data1[] = [
                'year_id' => $data[0]['year_idd'][0],
                'student_id' => $data[0]['student_idd'][$i],
                'room_id' => $data[0]['room_idd'][$i]['room_ids'][0],
                'bed_id' => $data[0]['bed_idd'][$i]['bed_ids'][0],
                ];
              // dd($data1[0]['room_id'][2]);
            }

       // }
          //dd($data1);
            allocations::insert($data1);

            return redirect()->route('allocations.index')->with('success',
            'Students are allocated in rooms succesfully!.');
      }

      else{
        return redirect()->route('allocations.index')->with('error',
         'Please select student and assign them to the rooms with exact year!');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\allocations  $allocations
     * @return \Illuminate\Http\Response
     */
    public function show(allocations $allocations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\allocations  $allocations
     * @return \Illuminate\Http\Response
     */
    public function edit(allocations $allocations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\allocations  $allocations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, allocations $allocations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\allocations  $allocations
     * @return \Illuminate\Http\Response
     */
    public function destroy(allocations $allocations)
    {
        //
    }
}
