
@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
  <div class="col-8 ml-4">
    <div class="card-header">
      <h3 class="card-title">Create new hostel.</h3>

    <div class="tile-title">
      <p></p><a class="btn btn-primary" href="{{ route('hostels.index') }}">Back..</a></p>
    </div>

  
<form action="/hostels" method="POST" class="pb-5" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputName1"> <strong>Hostel Name</strong> </label>
      <input class="form-control" type="name" name="name" placeholder="Hostel name">
      <div>{{ $errors->first('name')}}</div>
    </div>

    <div class="form-group">
      <label for="exampleInputblocks_capacity1"> <strong>Blocks capacity</strong> </label>
      <input class="form-control"  type="number" name="blocks_capacity" placeholder="Blocks capacity">
      <div>{{ $errors->first('blocks_capacity')}}</div>
    </div>
    
    <div class="tile-footer">
      <button class="btn btn-primary" type="submit">Submit</button>
    </div>
    

    @csrf
  </form>

</div>
</div>
</div>
    
@endsection