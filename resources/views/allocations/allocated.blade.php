



@extends('layouts.master')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
          <h3 class="card-title">LIST OF ALLOCATED STUDENTS</h3>
          <div class="tile-title-w-btn">
            <p><a class="btn btn-primary icon-btn" href="{{ route('generatePDF.print') }}"><i class="fa fa-print"></i>Print or download pdf</a></p>
          </div>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">

            </div>
          </div>
        </div>
        <!-- /.card-header --> 

        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables" >

            <thead>
              <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th class="text-center">Student Gender</th>
                <th class="text-center">Year</th>
                <th class="text-center">Hostel</th>
                <th class="text-center">Block</th>
                <th class="text-center">Room</th>
                <th class="text-center">Mattress Number</th>
              </tr>
            </thead>

            <tbody>

              @foreach ($allocation as  $key => $all )
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $all->student->user->name }}</td>
                <td class="text-center">{{ $all->student->gender->short_name}}</td>
                <td class="text-center">{{ $all->year->name}}</td>
                <td class="text-center">{{ $all->room->block->hostel->name }}</td>
                <td class="text-center">{{ $all->room->block->number }}{{ $all->room->block->name }}</td>
                <td class="text-center">{{ $all->room->number }}</td>
                <td class="text-center">{{ $all->bed->number }}</td>
              </tr>
              @endforeach
            </tbody>

          </table>
        </div>
        </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

  <script>
    function removeAllocation(all) {
         if (confirm('Are you sure you want to remove  '+ar.name+'blocks ? ')) {
             $('#form'+all.id).submit()
         }
  
         
     }
    </Script>
    
@endsection