

@extends('layouts.master')
@section('content')
  
@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Available Years</h5>

                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user-plus"></i>
                            </a>
                            
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="{{ route('yearSetting.create') }}">Set new year</a>
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
                        <th>Year</th>
                        <th>Start</th>
                        <th>Ends</th>
                        <th>Changes</th>
                        <th class="text-center">setting</th>
                        <th class="text-center">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach ($years as $key => $ye)
		                    <tr class="gradeX">
		                        <td>{{ $key+1 }}</td>
                                <td>{{ $ye->name }}</td>
                                <td>{{ $ye->start }}</td>
                                <td>{{ $ye->end }}</td>
                                <td>{{ $ye->updated_at }}</td>
                                
		                        <td class="text-center">
                                    
                                    <a href="javascript:void(0)" onclick="deleteYear({{ $ye}})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form hidden method="post" action="{{ route('yearSetting.destroy', $ye->id) }}" id="form{{ $ye->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </td>

                                <td>
                                    <a href="{{ route('yearSetting.edit', $ye->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
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
@endsection

@section('js')
    <!-- Data Tables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

    <script>
       function deleteYear(ye) {
            if (confirm('Delete '+ye.name+' '+ye.ends+'?')) {
                $('#form'+ye.id).submit()
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
