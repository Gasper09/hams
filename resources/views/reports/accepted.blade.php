
@extends('layouts.master')
@section('content')
  
@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Accepted List</h5>

                        {{-- <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user-plus"></i>
                            </a>
                            
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="{{ route('users.create') }}">Add User</a>
                                </li>
                            </ul>
                        </div> --}}

                    </div>
                    
                <div class="ibox-content">
                 <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Student level</th>
                        <th>Student Gender</th>
                        <th>Student Disability</th>

                        @can('UpdateInfo')
                        <th class="text-center">Select Students</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach ($acceptedRequests as $key => $rr)
		                    <tr class="gradeX">
		                        <td>{{ $key+1 }}</td>
                                <td>{{ $rr->student->user->name }}</td>
                                <td>{{ $rr->student->request->level }}</td>
                                <td>{{ $rr->student->gender->short_name }}</td>
                                <td>{{ $rr->student->disability }}</td>
                                
                                @can('UpdateInfo')
                                <form method="post" action="{{ 'reject' }}" enctype="multipart/form-data">
                                    @csrf

		                        <td class="text-center">
                                    <input type="checkbox" name="id[]" value="{{ $rr->id }}"  id="customControlValidation1" >
                                    <input type="checkbox" name="status[]" value="{{ 0}}"  id="customControlValidation1" >
                                </td>
                                @endcan
                                
		                    </tr>
                    	@endforeach
                </tbody>
            </table>
        </div>
    </div>
     
    @can('UpdateInfo')
    <div class="div">
        <div class="row">
            <div class="col mr-2">
                <button class="btn btn-primary" type="submit">Reject Request</button>
            </div>
        </div>
        
    </div>
    @endcan
    </form>
</div>
</div>
</div>
</div>
@endsection

@section('js')
    <!-- Data Tables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

    <script>
       function deleteRequest(rr) {
            if (confirm('Delete '+student.full_name+' '+student.level+'?')) {
                $('#form'+studentRequest.id).submit()
            }
        }
 
        }
    </script>

    <script>
    	$(document).ready(function() {
            $('.dataTables').DataTable();
        });

    </script>
@endsection
