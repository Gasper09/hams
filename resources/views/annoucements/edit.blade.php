
@extends('layouts.master')
@section('content')

<div class="container justify-content-md-center">
<div class="row">
  <div class="col-8 ml-4">
    <div class="card-header">
      <h3 class="card-title">Edit annoucement.</h3>

    <div class="tile-title">
      <p></p><a class="btn btn-primary" href="{{ route('annoucements.index') }}">Back..</a></p>
    </div>

  
<form action="/annoucements" method="POST" class="pb-5" enctype="multipart/form-data">


    <div class="form-group">
        <label for="exampleInputNumber1"> <strong>Title</strong> </label>
        <input class="form-control" type="text" value="{{ old('title') ?? $annoucement->title }}"  name="title" placeholder="Title" value="{{ old('title') }}">
        <div>{{ $errors->first('title')}}</div>
    </div>

    <div class="form-group">
        <label for="exampleInputName1"> <strong>Contents</strong> </label>
        <input class="form-control" value="{{ old('body') ?? $annoucement->body }}" type="text" name="body" placeholder="Contents" >
        <div>{{ $errors->first('body')}}</div>
    </div>

    <div class="form-group">
      <label for="exampleInputroom_capacity1"> <strong>File attachment</strong> </label>
      <input class="form-control"  type="file" name="file" placeholder="File attachment">
      <div>{{ $errors->first('file')}}</div>
    </div>
    
    <div class="tile-footer">
      <button class="btn btn-primary" type="submit">Send..</button>
    </div>
    

    @csrf
  </form>

</div>
</div>
</div>
    
@endsection
