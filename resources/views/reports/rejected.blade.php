
@extends('layouts.master')
@section('content')
  
@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Rejected List</h5>

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
                        <th class="text-center">Delete</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach ($rejectedRequests as $key => $rr)
		                    <tr class="gradeX">
		                        <td>{{ $key+1 }}</td>
                                <td>{{ $rr->student->user->name }}</td>
                                <td>{{ $rr->student->request->level }}</td>
                                <td>{{ $rr->student->gender->short_name }}</td>
                                <td>{{ $rr->student->disability }}</td>
                                
                                @can('UpdateInfo')
		                        <td class="text-center">
                                    
                                    <a href="javascript:void(0)" onclick="deleteRequest({{ $rr}})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form hidden method="post" action="{{ route('requests.destroy', $rr->id) }}" id="form{{ $rr->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </td>
                                @endcan
		                    </tr>
                    	@endforeach
                </tbody>
            </table>
        </div>
    </div>
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
