
@extends('layouts.master')
@section('content')
  
@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Requests List</h5>

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

                     @if ($studentRequest->count() > 0)
                         
                      
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Student Level</th>
                        <th>Student Gender</th>
                        <th>Student Disability</th>

                        @can('UpdateInfo')
                        <th class="text-center">Select Students</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentRequest as $key => $sr)
                         @if ( $sr->status  == 0)
		                    <tr class="gradeX">
		                        <td>{{ $key+1 }}</td>
                                <td>{{ $sr->student->user->name }}</td>
                                <td>{{ $sr->student->request->level }}</td>
                                <td>{{ $sr->student->gender->short_name }}</td>
                                <td>{{ $sr->student->disability}}</td>
                                
                                @can('UpdateInfo')
                                <form method="post" action="{{ 'accept' }}" enctype="multipart/form-data">
                                    @csrf
                                    
		                        <td class="text-center">
                                    <input type="checkbox" name="id[]" value="{{ $sr->id }}"  id="customControlValidation1" >
                                    <input type="checkbox" name="status[]" value="{{ 1 }}"  id="customControlValidation1" >
                                    {{-- <a href="javascript:void(0)" onclick="deleteRequest({{ $sr}})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a> --}}

                                </td>
                                @endcan
                                {{-- <form hidden method="post" action="{{ route('requests.destroy', $sr->id) }}" id="form{{ $sr->id }}">
                                    @csrf
                                    @method('DELETE') --}}
                                {{-- </form> --}}
                                
                                {{-- <td class="center"> --}}
                                  
                                    <div class="custom-control custom-radio">
                                        {{-- <input type="radio" class="custom-control-input" id="customControlValidation2" name="status[]" value="{{ 1 }}" >
                                      <label class="custom-control-label" for="customControlValidation2">Accept</label> --}}

                                        {{-- <select class="form-control" name="status" id="status"> --}}
                                            {{-- <option value="0" {{ $sr->inactive == 'inactive' ? 'selected' : '' }} >Reject</option> --}}
                                            {{-- <option value="1" {{ $sr->active == 'active' ? 'selected' : '' }} >Accept</option>
                                        </select> --}}

                                        

                                        
                                      </div>
                                  
                                {{-- </td> --}}
                                
                            </tr>
                            @endif
                    	@endforeach
                </tbody>
            </table>
        </div>
        @endif  
    </div>

    @can('UpdateInfo')
    <div class="div">
        <div class="row">
            <div class="col mr-2">
                <button class="btn btn-primary" type="submit">Accept Request</button>
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
       function deleteRequest(sr) {
            if (confirm('Delete '+sr.student.full_name+' '+sr.student.level+'?')) {
                $('#form'+sr.id).submit()
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
