


@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
  <div class="col-8 ml-4">
    <div class="card-header">
      <h3 class="card-title">Add new year.</h3>

    <div class="tile-title">
      <p></p><a class="btn btn-primary" href="{{ route('yearSetting.index') }}">Back..</a></p>
    </div>

  
<form action="/yearSetting" method="POST" class="pb-5" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="exampleInputroom1"> <strong>Year</strong> </label>
        <input class="form-control"  type="number" name="year" placeholder="year">
        <div>{{ $errors->first('year')}}</div>
    </div>

    <div class="form-group">
      <label for="exampleInputbed_capacity1"> <strong>Start</strong> </label>
      <input class="form-control"  type="date" name="start" placeholder="start">
      <div>{{ $errors->first('start')}}</div>
    </div>

    <div class="form-group">
        <label for="exampleInputbed_capacity1"> <strong>Ends</strong> </label>
        <input class="form-control"  type="date" name="end" placeholder="end">
        <div>{{ $errors->first('end')}}</div>
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