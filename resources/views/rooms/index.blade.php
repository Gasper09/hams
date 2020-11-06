

@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">LIST OF ROOMS IN HOSTEL</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
             
              @can('UpdateInfo')
              <div class="tile-footer">
                <p></p><a class="btn btn-primary" href="{{ route('rooms.create') }}">Create New</a></p>
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
                <th>Hostel Name</th>
                <th>Block Name</th>
                <th>Room Number</th>
                <th>Room Bed Capacity</th>

                @can('UpdateInfo')
                <th>Action</th>
                @endcan
              </tr>
            </thead>

            <tbody>

              @foreach ($rooms as  $key => $room )
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $room->block->hostel->name }}</td>
                <td>{{ $room->block->name }}</td>
                <td>{{ $room->number }}</td>
                <td>{{ $room->bed_capacity }}</td>

                @can('UpdateInfo')
                <td>
                  <a href="{{ route('rooms.edit', $room->id) }}">
                      <i class="fa fa-edit"></i>
                  </a>

                  <a href="javascript:void(0)" onclick="deleteRoom({{ $room }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                      <i class="fa fa-trash"></i>
                  </a>

                </td>
                <form action="{{ route('rooms.destroy', $room->id) }}" id="form{{ $room->id }}" method="POST" >
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
    function deleteRoom(room) {
         if (confirm('Are you sure you want to delete room number '+room.number+' ? ')) {
             $('#form'+room.id).submit()
         }
  
         
     }
    </Script>
    
@endsection