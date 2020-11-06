
@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">LIST OF HOSTELS</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
             

              <div class="tile-footer">
                <p></p><a class="btn btn-primary" href="{{ route('hostels.create') }}">Create New</a></p>
              </div>

            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">

            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Blocks</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>

              @foreach ($hostels as  $key => $hostel )
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $hostel->name }}</td>
                <td>{{ $hostel->blocks_capacity }}</td>

                <td>
                  <a href="{{ route('hostels.edit', $hostel->id) }}">
                      <i class="fa fa-edit"></i>
                  </a>

                  <a href="javascript:void(0)" onclick="deleteHostel({{ $hostel }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                      <i class="fa fa-trash"></i>
                  </a>

                </td>
                <form action="{{ route('hostels.destroy', $hostel->id) }}" id="form{{ $hostel->id }}" method="POST" >
                  @csrf
                  @method('DELETE')
                </form>

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
    function deleteHostel(hostel) {
         if (confirm('Are you sure you want to delete  '+hostel.name+'hostels ? ')) {
             $('#form'+hostel.id).submit()
         }
  
         
     }
    </Script>
    
@endsection