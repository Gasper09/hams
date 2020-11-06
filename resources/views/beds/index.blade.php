

@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">LIST OF MATTRESS</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
             
              @can('UpdateInfo')
              <div class="tile-footer">
                <p></p><a class="btn btn-primary" href="{{ route('beds.create') }}">Create New</a></p>
              </div>
              @endcan

            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">

            <thead>
              <tr>
                <th>ID</th>
                <th>Mattress Number</th>
                <th>Bed Student Capacity</th>

                @can('UpdateInfo')
                <th>Action</th>
                @endcan

              </tr>
            </thead>

            <tbody>

              @foreach ($beds as  $key => $bed )
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $bed->number }}</td>
                <td>{{ $bed->student_capacity }}</td>

                @can('UpdateInfo')
                <td>
                  <a href="{{ route('beds.edit', $bed->id) }}">
                      <i class="fa fa-edit"></i>
                  </a>

                  <a href="javascript:void(0)" onclick="deleteRoom({{ $bed }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                      <i class="fa fa-trash"></i>
                  </a>

                </td>
                <form action="{{ route('beds.destroy', $bed->id) }}" id="form{{ $bed->id }}" method="POST" >
                  @csrf
                  @method('DELETE')
                </form>
                @endcan

              </tr>
              @endforeach
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

  <script>
    function deleteRoom(bed) {
         if (confirm('Are you sure you want to delete bed number '+bed.number+' ? ')) {
             $('#form'+bed.id).submit()
         }
  
         
     }
    </Script>
    
@endsection