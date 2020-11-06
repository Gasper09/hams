
@extends('layouts.master')	

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

    	<div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit User <small class="text-danger">* is mandatory.</small></h5>
                <div class="ibox-tools">

                  <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                  </a>

                  <a class="close-link">
                    <i class="fa fa-times"></i>
                  </a>

                </div>
                </div>
                
                <div class="ibox-content">
                    <form method="post" action="{{ route('users.store') }}" class="form-horizontal">
                        @csrf
                        @method('patch')

                        <div class="form-group @error('first_name') has-error @enderror">
                            <label class="col-sm-2 control-label">Name *</label>
                            <div class="col-sm-4">
                                <input type="text" name="name" value="{{ old('name') ?? $user->name }}" class="form-control">
                                @error('name') 
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group @error('email') has-error @enderror">
                            <label class="col-sm-2 control-label">Email *</label>
                            <div class="col-sm-4">
                                <input type="text" name="email" value="{{ old('email') ?? $user->email }}" class="form-control">
                                @error('email') 
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group @error('role') has-error @enderror">
                            <label for="role" class="col-sm-2 control-label">Role *</label>
                            <div class="col-sm-4">
                                <select type="text" name="role" class="form-control">
                                    <option disabled selected>Choose Role</option>
                                    @foreach ($roles as $role)
                                        <option {{ old('role') == $role->name? 'selected':'' }} value="{{ $role->name }}">{{ title_case($role->name) }}</option>
                                    @endforeach
                                </select>
                                @error('role') 
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group @error('phone_number') has-error @enderror">
                            <label class="col-sm-2 control-label">Phone Number</label>
                            <div class="col-sm-4">
                                <input type="text" name="phone_number" value="{{ old('phone_number') ?? $user->phone_number }}" class="form-control">
                                @error('phone_number') 
                                    <span class="text-danger small">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-sm-2 control-label">{{ __('Password') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label   class="col-sm-2 control-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

    
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white" href="{{ route('users.index') }}">Cancel</a>
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

	</div>
</div>

@endsection