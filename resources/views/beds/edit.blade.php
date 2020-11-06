


@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
  <div class="col-8 ml-4">
    <div class="card-header">
      <h3 class="card-title">Edit details for {{ $bed->number }} {{ $bed->position }}</h3>

    <div class="tile-title">
      <p></p><a class="btn btn-primary" href="{{ route('beds.index') }}">Back..</a></p>
    </div>

  
<form action="/beds" method="POST" class="pb-5" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputName1"> <strong>Select Room Number</strong> </label>
      <select class="form-control input-lg dynamic" name="room_id" id="room_id"
       data-dependent="block">
        @foreach ($rooms as $room)
        <option value="{{ $room->id }}" {{ old('room') == $room->id? 'selected' : '' }} >{{ $room->number }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
        <label for="exampleInputName1"> <strong>Select Position</strong> </label>
        <select class="form-control input-lg dynamic" name="position" id="position"
         data-dependent="block">
          <option value="top" {{ old('position') == $bed->id? 'selected' : '' }} >Top</option>
          <option value="down" {{ old('position') == $bed->id? 'selected' : '' }} >Down</option>
        </select>
      </div>


    <div class="form-group">
        <label for="exampleInputroom1"> <strong>Bed Number</strong> </label>
        <input class="form-control"  type="number" name="number" placeholder="Bed Number">
        <div>{{ $errors->first('number')}}</div>
    </div>

    <div class="form-group">
      <label for="exampleInputbed_capacity1"> <strong>Student capacity</strong> </label>
      <input class="form-control"  type="number" name="student_capacity" placeholder="student capacity">
      <div>{{ $errors->first('student_capacity')}}</div>
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