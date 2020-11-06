@extends('layouts.master')

@section('css')
    <!-- Data Tables -->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        @can('RequestHostel')
                        <h5>Profile for {{ auth()->user()->name }}</h5>
                        @endcan

                        @if(auth()->user()->hasRole('admin'))
                        <h5>Students List</h5>
                        
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-plus-square-o"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="{{ route('students.create') }}">Add student</a>
                                </li>
                            </ul>
                        </div>
                        @endif

                    </div>
                    <div class="ibox-content">
                    
                 @if(auth()->user()->hasRole('admin'))
                 <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" >
                    <thead>
                    <tr>
                        <th width="10
                        ">#</th>
                        <th>Full Name</th>
                        <th>Registration</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($students->count())
                    	@foreach ($students as $key => $student)
		                    <tr class="gradeX">
		                        <td>{{ $key+1 }}</td>
                                <td>{{ $student->user->name }}</td>
                                <td>{{ $student->reg_no }}</td>
                                <td>{{ $student->gender->short_name }}</td>
                                <td>{{ $student->user->email }}</td>
                                <td>{{ $student->user->phone_number }}</td>
		                        <td class="center">

		                        	{!! $student->deleted_at == ''? '<span class="badge badge-primary">Active</span>':'<span class="badge badge-danger">Inactive</span>' !!}
		                        </td>
		                        <td class="text-center">
                                    @if (isset($student->deleted_at))
                                    <a href="javascript:void(0)" onclick="restorestudent({{ $student }})" class=" text-danger"><i class="fa fa-exchange" data-toggle="tooltip" data-placement="top" title="Restore"></i></a>
                                    @else

		                        	<a href="{{ route('students.edit', $student->id) }}" class=""><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                    <a href="javascript:void(0)" onclick="deletestudent({{ $student }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i></a>
                                    @endif
                                    <form hidden method="post" action="{{ route('students.destroy', $student->id) }}" id="form{{ $student->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
		                        </td>
		                    </tr>
                        @endforeach
                        
                        @else
                        <p>No Student in database!</p>
                        @endif
                </tbody>
            </table>
            {{-- {{ $students->render() }} --}}
        </div>
        @endif

        @can('RequestHostel')
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables" >
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Registration</th>
                <th>Genger</th>
                <th>Sponsor</th>
                <th>Disability</th>
                <th>Phone Number</th>
            </tr>
            </thead>
            <tbody>
                @if($students->count())
                @foreach ($students as $key => $student)
                    <tr class="gradeX">
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->user->email }}</td>
                        <td>{{ $student->reg_no }}</td>
                        <td>{{ $student->gender->short_name }}</td>
                        <td>{{ $student->sponsor }}</td>
                        <td>{{ $student->disability }}</td>
                        <td>{{ $student->user->phone_number }}</td>
                    </tr>
                @endforeach

                @else
                <p>Your not registered as student!</p>
                @endif

            </tbody>
        </table>
    </div>

    @if($students->count())
    <div class="tile mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="indicators">Messages</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <h4>Alerts</h4>
            <div class="bs-component">
              <div class="alert alert-dismissible alert-warning">
                <h4>In Request</h4>
                <p>
                    @foreach ($students as $key => $student) 
                    @if($student->id) 
                    <h6>{{ $msg }}
                    <a class="alert-link" href="{{ route('requests.create') }}">  Request Accomodation</a>
                    </h6>
                    @endif
                    @endforeach
                </p>
              </div>
            </div>
          </div>
        </div>

        @foreach ($students as $key => $student) 
        @if($student->id) 
        <div class="row">
          <div class="col-lg-4">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-danger">
                <strong>{{ $msg0 }}..!</strong>
              </div>
            </div>
          </div>
          @endif
          @endforeach

         @foreach ($students as $key => $student) 
         @if($student->id) 
         @if($msg1)
          <div class="col-lg-4">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <strong>{{ $msg1 }}</strong>
              </div>
            </div>
          </div>
          @endif
          @endif
          @endforeach

          <div class="col-lg-4">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-info">
                <strong>{{ $msg2 }}!</strong><a class="alert-link" href="{{ route('allocations.allocated') }}">allocation list</a>
              </div>
            </div>
          </div>
        </div>
     
      </div>
    @else
        <p>Your not registered as student!</p>
    @endif 
    @endcan

</div>
</div>
</div>
</div>

    <!-- Data Tables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

    <script>
       function deletestudent(student) {
            if (confirm('Are you sure you want to delete '+student.user.name+' student ?')) {
                $('#form'+student.id).submit()
            }
        }

       function restorestudent(student) {
            if (confirm('Restore '+student.full_name+'?')) {
                $('#form'+student.id).submit()
            }
        }
    </script>

    <script>
    	$(document).ready(function() {
            $('.dataTables').DataTable();
        });

    </script>
@endsection
