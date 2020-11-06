@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                            <div class="info">
                              <h4>Users</h4>
                              <p><b>{{ App\User::all()->count() }}</b></p>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
                            <div class="info">
                              <h4>Accepted</h4>
                              <p><b>{{ App\StudentRequest::where('status',1)->count()  }}</b></p>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                            <div class="info">
                              <h4>Allocations</h4>
                              <p><b>{{ App\allocations::all()->count() }}</b></p>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                            <div class="info">
                              <h4>Request</h4>
                              <p><b>{{ App\StudentRequest::all()->count() }}</b></p>
                            </div>
                          </div>
                        </div>

                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
