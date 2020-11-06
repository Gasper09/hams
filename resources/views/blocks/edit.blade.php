

@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
  <div class="col-8 ml-4">
    <div class="card-header">
      <h3 class="card-title">Edit details for {{ $block->name }}.</h3>

    <div class="tile-title">
      <p></p><a class="btn btn-primary" href="{{ route('blocks.index') }}">Back..</a></p>
    </div>

  
<form action="/blocks/{{ $block->id }}" method="POST" class="pb-5" enctype="multipart/form-data">
  @method('PACH')
    <div class="form-group">
       <select class="form-control" name="hostel_id" id="hostel_id">
            @foreach ($hostels as $hostel)
            <option value="{{ $hostel->id }}" {{ old('hostel') == $hostel->id? 'selected' : '' }} >{{ $hostel->name }}</option>
            @endforeach
       </select>
       <div>{{ $errors->first('hostel_id')}}</div>
    </div>

    <div class="form-group">
        <label for="exampleInputNumber1"> <strong>Block Number</strong> </label>
        <input class="form-control" type="number" name="number" placeholder="Block number">
        <div>{{ $errors->first('number')}}</div>
    </div>

    <div class="form-group">
        <label for="exampleInputName1"> <strong>Block Name</strong> </label>
        <input class="form-control" type="name" name="name" placeholder="Block name">
        <div>{{ $errors->first('name')}}</div>
    </div>

    <div class="form-group">
      <label for="exampleInputroom_capacity1"> <strong>Rooms capacity</strong> </label>
      <input class="form-control"  type="number" name="room_capacity" placeholder="Rooms capacity">
      <div>{{ $errors->first('room_capacity')}}</div>
    </div>
    
    <div class="tile-footer">
      <button class="btn btn-primary" type="submit">Update</button>
    </div>
    

    @csrf
  </form>

</div>
</div>
</div>
    
@endsection
