


@extends('layouts.master')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
          <h3 class="card-title">ALLOCATE STUDENTS TO THE HOSTEL</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
             

              @can('updateInfo')
              <div class="tile-footer">
                <p></p><a class="btn btn-primary" href="{{ route('beds.create') }}">Create New</a></p>
              </div>
              @endcan

            </div>
          </div>
        </div>
        <!-- /.card-header -->

        <form method="post" action="{{ 'allocations' }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <div class="row">
                    <div class="col-4">
                    <label for="exampleInputNumber1"> <strong>Enter year</strong> </label>
                    <select class="form-control" name="year_id" id="year_id">
                        @foreach ($years as $year)
                        <option value="{{ $year->id }}" {{ old('year') == $year->id? 'selected' : '' }} >{{ $year->name }}</option>
                        @endforeach
                   </select>

                   {{-- <td class="text-center">
                    <select class="form-control" multiple name="bed_id[]" id="bed_id">
                      <label>select a room</label>
                      @foreach ($beds as $bed)
                      <option value="{{ $bed->id}}"{{ $bed->id == $bed->id ? 'selected' : '' }}>Matrress Number{{ $bed->number }}</option>
                      @endforeach
                    </select>
                                    
                  </td> --}}

                    </div>
                </div>             
            </div>

                <div style="display: none">
                    
                </div>

        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables" >

            <thead>
              <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th class="text-center">Student Gender</th>
                <th class="text-center">Select Students</th>
                <th class="text-center">Rooms</th>
                @if(count($emptyRoom) > 0)
                <th class="text-center">Empty Rooms</th>
                @endif
                <th class="text-center">mattress</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($acceptedRequests as  $key => $ar )
              <tr>

                @foreach ($unAllocated as $key => $u)
                @if ($u->student_id == $ar->student_id)
                
                <td>{{ $key + 1 }}</td>
                <td>{{ $ar->student->user->name }}</td>
                <td class="text-center">{{ $ar->student->gender->short_name }}</td>
                
                <td class="text-center">
                  <input type="checkbox" name="student_id[]" value="{{ $ar->student->id }}"  id="customControlValidation1" >
                  {{-- <input type="checkbox" name="status[]" value="{{ 1 }}"  id="customControlValidation1" > --}}
                </td>
                
                <td class="text-center">
                  <select class="form-control" multiple name="roomList_id[]" id="room_id">
                    <label>select a room</label>
                    
                    
                    @foreach ($rooms as $room)
                    <option value="{{ $room->id}}"{{ $ar->room_id == $room->id ? 'selected' : '' }}>
                      {{ $room->block->hostel->name }}, Block {{ $room->block->number }}{{ $room->block->name }}, Room {{ $room->number }}
                    </option>
                    @endforeach
                    
                  </select>
                  
                </td>

                @if(count($emptyRoom) > 0)
                <td class="text-center">
                  <select class="form-control" multiple name="room_id[]" id="room_id">
                    <label>select a room</label>

                    @foreach ($emptyRoom as $em)
                    <option value="{{ $em->id}}"{{ $ar->id == $em->id ? 'selected' : '' }}>
                      {{-- Hostel {{ $em->block->hostel->name }} Block {{ $em->block->number }}{{ $em->block->name }}, --}}
                       Room {{ $em->number }}
                    </option>
                    @endforeach

                  </select>
                </td>
                @endif
                
                <td class="text-center">
                  <select class="form-control" multiple name="bed_id[]" id="bed_id">
                    <label>mattres no:</label>
                    @foreach ($beds as $bed)
                    <option value="{{ $bed->id}}"{{ $ar->bed_id == $bed->id ? 'selected' : '' }}>Mattress Number {{ $bed->number }}</option>
                    @endforeach
                  </select>
                  
                </td>
                
              </tr>

              @endif
              @endforeach
              @endforeach
            </tbody>

          </table>
        </div>
        </div>

        <div class="div">
            <div class="row">
                <div class="col pb-2">
                    <button class="btn btn-primary" type="submit">Submit All..</button>
                </div>
            </div>
        </div>
    </form>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

  <script>
    function removeAllocation(ar) {
         if (confirm('Are you sure you want to remove  '+ar.name+'blocks ? ')) {
             $('#form'+ar.id).submit()
         }
  
         
     }
    </Script>
    
@endsection