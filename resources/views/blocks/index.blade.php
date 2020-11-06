
@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">LIST OF BLOCKS</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
             

              <div class="tile-footer">
                <p></p><a class="btn btn-primary" href="{{ route('blocks.create') }}">Create New</a></p>
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
                <th>Hostel Name</th>
                <th>Block Number</th>
                <th>Block Name</th>
                <th>Block Room Capacity</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>

              @foreach ($blocks as  $key => $block )
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $block->hostel->name }}</td>
                <td>{{ $block->number }}</td>
                <td>{{ $block->name }}</td>
                <td>{{ $block->room_capacity }}</td>

                <td>
                  <a href="{{ route('blocks.edit', $block->id) }}">
                      <i class="fa fa-edit"></i>
                  </a>

                  <a href="javascript:void(0)" onclick="deleteHostel({{ $block }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                      <i class="fa fa-trash"></i>
                  </a>

                </td>
                <form action="{{ route('blocks.destroy', $block->id) }}" id="form{{ $block->id }}" method="POST" >
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
    function deletBlock(block) {
         if (confirm('Are you sure you want to delete  '+block.name+'blocks ? ')) {
             $('#form'+block.id).submit()
         }
  
         
     }
    </Script>
    
@endsection