


@extends('layouts.master')	

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Student Edit <small class="text-danger">* is mandatory.</small></h5>
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
                <form method="post" action="{{ route('students.store') }}" class="form-horizontal" enctype="multipart/form-data">
                    @method('patch')
                    @csrf

                    <div class="form-group @error('name') has-error @enderror">
                        <label class="col-sm-2 control-label">Name *</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" value="{{ old('name') ?? $student->user->name }}" class="form-control">
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
                            <input type="text" name="email" value="{{ old('email') ?? $student->user->email }}"class="form-control">
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

                    <div class="form-group @error('reg_no') has-error @enderror">
                        <label class="col-sm-2 control-label">Registration No: *</label>
                        <div class="col-sm-4">
                            <input type="text" name="reg_no" value="{{ old('reg_no') ?? $student->reg_no }}" class="form-control">
                            @error('reg_no') 
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group @error('sponser') has-error @enderror">
                        <label class="col-sm-2 control-label">Sponser *</label>
                        <div class="col-sm-4">
                            <select type="text" name="sponsor" class="form-control">
                                <option disabled selected>Choose Your Sponser</option>
                                {{-- <option {{ old('role') == $role->name? 'selected':'' }} value="{{ $role->name }}">{{ title_case($role->name) }}</option> --}}
                                    <option {{ old('sponsor')? 'selected' : '' }} value="Goverment">Government</option>
                                    <option {{ old('sponsor')? 'selected' : ''}} value="HESLB">HESLB</option>
                                    <option {{ old('sponsor')? 'selected' : '' }} value="Private">Private</option>
                            </select>
                            @error('sponser') 
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group @error('gender') has-error @enderror">
                        <label class="col-sm-2 control-label">Gender *</label>
                        <div class="col-sm-4">
                            <select type="text" name="gender_id" class="form-control">
                                <option disabled selected>Choose gender</option>
                                @foreach ($genders as $gender)
                                    <option {{ old('gender_id') == $gender->id? 'selected':'' }} value="{{ $gender->id }}">{{ ($gender->name) }}</option>
                                @endforeach
                            </select>
                            @error('gender') 
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group @error('phone_number') has-error @enderror">
                        <label class="col-sm-2 control-label">phone_number</label>
                        <div class="col-sm-4">
                            <input type="text" name="phone_number" value="{{ old('phone_number') ?? $student->user->phone_number }}" class="form-control">
                            @error('phone_number') 
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group @error('disability') has-error @enderror">
                        <label class="col-sm-2 control-label">Non-disability</label>
                        <input type="radio" name="disability" value="false" checked>

                        <label class="col-sm-1 ml-4  control-label">disability</label>
                        <input type="radio" name="disability" value="true">
                        <div class="col-sm-4">
                            {{-- <input type="text" name="disability" value="{{ old('disability') }}" class="form-control"> --}}
                            @error('disability') 
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group @error('image') has-error @enderror">
                        <label class="col-sm-2 control-label">disability file</label>
                        <div class="col-sm-4">
                            <input type="file" class=" py-3" id="inputImage" name="image" >
                            <div>{{ $errors->first('image')}}</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">{{ __('Password') }}</label>
                        <div class="col-sm-4">
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-sm-2 control-label">{{ __('Confirm Password') }}</label>
                        <div class="col-sm-4">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a class="btn btn-white" href="{{ route('students.index') }}">Cancel</a>
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