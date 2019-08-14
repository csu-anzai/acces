@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
<?php
  $schools = DB::table('schools')->get();

  $designations = DB::table('designations')->get();

  $organizations = DB::table('organizations')->get();
?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-success">
                <h4 class="card-title">{{ __('Add User') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-success">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('First Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : ' has-success' }}">
                      <input class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" id="input-firstname" type="text" placeholder="{{ __('First Name') }}" value="{{ old('firstname') }}" required="true" aria-required="true"/>
                      @if ($errors->has('firstname'))
                        <span id="firstname-error" class="error text-danger" for="input-firstname">{{ $errors->first('firstname') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Last Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : ' has-success' }}">
                      <input class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" id="input-lastname" type="text" placeholder="{{ __('Last Name') }}" value="{{ old('lastname') }}" required="true" aria-required="true"/>
                      @if ($errors->has('lastname'))
                        <span id="lastname-error" class="error text-danger" for="input-lastname">{{ $errors->first('lastname') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Designation') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('designation') ? ' has-danger' : ' has-success' }}">
                      <select class="browser-default custom-select{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation_id" id="input-designation" required>
                        <option disabled selected value="">Designation</option>
                        @foreach($designations as $designation)
                        <option value="{{$designation->id}}">{{$designation->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('School') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('school') ? ' has-danger' : ' has-success' }}">
                      <select id="school_dropbox" class="browser-default custom-select{{ $errors->has('school') ? ' is-invalid' : '' }}" name="school_id" id="input-school" required>
                        <option disabled selected value="">School</option>
                        @foreach($schools as $school)
                        <option value="{{$school->id}}">{{$school->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Department') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('department') ? ' has-danger' : ' has-success' }}">
                      <select id="department_dropbox" class="browser-default custom-select{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department_id" id="input-department" required>
                        <option disabled selected value="">Department</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Organization') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('organization') ? ' has-danger' : ' has-success' }}">
                      <select class="browser-default custom-select{{ $errors->has('organization') ? ' is-invalid' : '' }}" name="organization_id" id="input-organization" required>
                        <option disabled selected value="">Organization</option>
                        @foreach($organizations as $organization)
                        <option value="{{$organization->id}}">{{$organization->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Username') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('username') ? ' has-danger' : ' has-success' }}">
                      <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="input-username" type="text" placeholder="{{ __('Username') }}" value="{{ old('username') }}" required />
                      @if ($errors->has('username'))
                        <span id="username-error" class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : ' has-success' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Contact Number') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('contact') ? ' has-danger' : ' has-success' }}">
                      <input class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" id="input-contact" type="text" placeholder="{{ __('Contact Number') }}" value="{{ old('contact') }}" required="true" aria-required="true"/>
                      @if ($errors->has('contact'))
                        <span id="contact-error" class="error text-danger" for="input-contact">{{ $errors->first('contact') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : ' has-success' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" value="" minlength="8" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group has-success">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">{{ __('Add User') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
  <script>
    //Dynamic department dropbox
    $("#school_dropbox").change(function(){
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'POST',
        url:'/getDepartments',
        data:{id: $("#school_dropbox").val()},
        success:function(data){
          var options = '<option disabled selected value="">Department</option>';
          
          $.each(data.departments, function(key, value){
            options += '<option value="'+value.id+'">'+value.name+'</option>';
          });

          $("#department_dropbox").html(options);
        }
      });
    });

  </script>
@endsection