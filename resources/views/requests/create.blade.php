
@extends('layouts.master')
@section('content')

<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Request accomodation.</h3>
      <div class="tile-body">

        <form class="row" method="post" action="{{ route('requests.store') }}">
          @csrf
          <div class="form-group col-md-3">
            <label class="control-label">Your Name</label>
            <input class="form-control" type="text" value="{{ Auth()->user()->name }}" name="student_id" placeholder="{{ Auth()->user()->name }}" >
          </div>

          <div class="form-group col-md-3">
            <label class="control-label">Level</label>
            <input class="form-control" type="text" name="level" placeholder="Enter your level" >
          </div>

          

          <div class="form-group col-md-4 align-self-end">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit Request</button>
          </div>

        </form>

      </div>
    </div>
  </div>
@endsection

