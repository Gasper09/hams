
@extends('layouts.master')
@section('content')

<div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Request list.</h3>
      <div class="tile-body">

        <form class="row" method="post" action="{{ route('requests.store') }}">
          @csrf
          <div class="form-group col-md-3">
            <label class="control-label">Your Name</label>
            <select class="form-control" name="student_id" id="student_id">
                @foreach ($students as $student)
                <option value="{{ $student->id }}" {{ old('student') == $student->id? 'selected' : '' }} >{{ $student->full_name }}</option>
                @endforeach
           </select>
          </div>

          <div class="form-group col-md-3">
            <label class="control-label">Level</label>
            <input class="form-control" type="text" name="level" placeholder="Enter your level" >
          </div>

        @can('UpdateInfo')
          <div class="form-group col-md-4 align-self-end">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit Request</button>
          </div>
        @endcan

        </form>

      </div>
    </div>
  </div>
@endsection

