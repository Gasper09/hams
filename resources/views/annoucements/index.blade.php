

@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">ANNOUCEMENTS</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
             

              @can('UpdateInfo')
              <div class="tile-footer">
                <p></p><a class="btn btn-primary" href="{{ route('annoucements.create') }}">Create New</a></p>
              </div>
              @endcan

            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          
            @foreach ($annoucements as $an)

            <div class="col-md-12 pt-4">
                <div class="tile">
                  <h3 class="tile-title">{{ $an->title }}</h3>
                  <div class="tile-body">{{ $an->body }}</div>
                  <div class="tile-body">
 
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="{{ $an->file}}" alt="User profile picture">
                    </div>
                  </div>

                  @can('UpdateInfo')
                  <div class="tile-footer"><a class="btn btn-primary" href="{{ route('requests.create') }}">follow</a>
                    <a href="javascript:void(0)" onclick="deleteAn({{ $an }})" class=" text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="fa fa-trash"></i>
                    </a>
                    /
                    <a href="{{ route('annoucements.edit', $an->id) }}">
                      <i class="fa fa-edit"></i>
                  </a>
                    <form action="{{ route('annoucements.destroy', $an->id) }}" id="form{{ $an->id }}" method="POST" >
                        @csrf
                        @method('DELETE')
                      </form>

                </div>
                @endCan

                </div>
            </div>

            {{-- @if($an->file)
            <div class="row">
            <div class="col-12">
              <table>
                <th>file</th>
                <td><img src=" {{ asset('storage/' .$an->file) }} " class="img-thumbnail"> </td>
              </table>
             
            </div>
            </div>
            @endif  --}}
                            
            @endforeach

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

  <script>
    function deleteAn(an) {
         if (confirm('Are you sure you want to delete  '+an.title+'blocks ? ')) {
             $('#form'+an.id).submit()
         }
  
         
     }
    </Script>
    
@endsection