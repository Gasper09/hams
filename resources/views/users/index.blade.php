
@extends('layouts.master')
@section('content')
  
@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Users List</h5>
                        <div class="ibox-tools">
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
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>User Role</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach ($users as $key => $user)
		                    <tr class="gradeX">
		                        <td>{{ $key+1 }}</td>
		                        <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
		                        <td class="center">{{ $user->phone_number }}</td>
		                        <td class="center">

		                        	{!! $user->deleted_at == ''? '<span class="badge badge-primary">Active</span>':'<span class="badge badge-danger">Inactive</span>' !!}
		                        </td>
		                        <td class="text-center">
                                    @if (isset($user->deleted_at))
                                    <a href="javascript:void(0)" onclick="restoreUser({{ $user}})" class=" text-danger"><i class="fa fa-exchange" data-toggle="tooltip" data-placement="top" title="Restore"></i></a>
                                    @else
		                        	<a href="{{ route('users.edit', $user->id) }}" class=""><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                    
                                    <a href="javascript:void(0)" onclick="deleteUser({{ $user }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i></a>
                                    @endif
                                    <form hidden method="post" action="{{ route('users.destroy', $user->id) }}" id="form{{ $user->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
		                        </td>
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

<script>
       function deleteUser(user) {
            if (confirm('Are you sure you want to delete '+user.name+' with email '+user.email+'?')) {
                $('#form'+user.id).submit()
            }
        }
    </script>
    
    <script>
       function restoreUser(user) {
            if (confirm('Restore '+user.first_name+' '+user.last_name+'?')) {
                $('#form'+user.id).submit()
            }
        }
    </script>

<script>
    	$(document).ready(function() {
            $('.dataTables').DataTable();
        });

</script>

@endsection