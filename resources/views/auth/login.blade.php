@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('ACCES')])
@section('content')

<title>ACCES - Welcome!</title>

<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-7 ml-auto mr-auto">
      <img src="images/logo_main.png" style="width: 100%; max-width: 550px; height: auto;">
    </div>
    <div class="col-lg-5 col-md-5 col-sm-5 ml-auto mr-auto">

      <!-- Login Form -->
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card card-login card-hidden mb-3">
          <div class="card-body">
            <p class="card-description text-center">Sign in to your account.</p>
            <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : ' has-success' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">person</i>
                  </span>
                </div>
                <div class="form-group bmd-form-group" style="width:76%">
                  <label class="bmd-label-floating">Username</label>
                  <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                </div>
              </div>
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : ' has-success' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <div class="form-group bmd-form-group" style="width:76%">
                  <label class="bmd-label-floating">Password</label>
                  <input type="password" name="password" id="password" class="form-control" required>
                </div>
              </div>
              @if ($errors->has('password'))
              <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                <strong>{{ $errors->first('password') }}</strong>
              </div>
              @endif
            </div>
            @if ($errors->has('username'))
            <div id="username-error" class="error text-danger pl-3" for="username" style="display: block;">
              <strong>{{ $errors->first('username') }}</strong>
            </div>
            @endif
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-success">{{ __('Login') }}</button>
          </div>
        </div>
      </form>

      <!-- Forgot Password -->
      <div class="row">
        <div class="col-6">
          @if (Route::has('password.request'))
          <a href="#" class="text-white" data-toggle="modal" data-target="#exampleModal2">
            <small>Forgot password?</small>
          </a>
          @endif
        </div>

        <!-- Registration Button -->
        <div class="col-6 text-right">
          <a href="#" class="text-white" data-toggle="modal" rel="tooltip" data-placement="top" title="For Co-curricular and Extra-curricular Student Organization Representatives, Student Organization Advisers, and Faculty." data-target="#exampleModal">
            <small>Don't have an account?</small>
          </a>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

<!-- Registration Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-signup modal-lg" role="document">
    <div class="modal-content">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h2 class="text-center"><strong>Registration</strong></h2>
          <p class="text-muted text-center" style="font-size:90%">For Co-curricular and Extra-curricular Student Organization Representatives, Student Organization Advisers, and Faculty.</p>
          <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : ' has-success' }}">

          <div class="container">
            <div class="row">

              <!-- Personal Information -->
              <div class="col-md-6">
                <h3 class="mt-0"><strong>Personal Information</strong></h3>

                <!-- First Name -->
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">First name</label>
                  <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}" required>
                </div>
                @if ($errors->has('firstname'))
                <div id="firstname-error" class="error text-danger pl-3" for="firstname" style="display: block;">
                  <strong>{{ $errors->first('firstname') }}</strong>
                </div>
                @endif

                <!-- Last Name -->
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Last name</label>
                  <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" required>
                </div>
                @if ($errors->has('lastname'))
                <div id="lastname-error" class="error text-danger pl-3" for="lastname" style="display: block;">
                  <strong>{{ $errors->first('lastname') }}</strong>
                </div>
                @endif

                <!-- Designation -->
                <div class="form-group">
                  <select class="form-control" name="designation" value="{{ old('designation') }}" required>
                    <option value="" disabled selected>Designation</option>
                    <option value="Co-Curricular Organization">Co-Curricular Organization</option>
                    <option value="Extra-Curricular Organization">Extra-Curricular Organization</option>
                    <option value="Faculty">Faculty</option>
                    <option value="Student Organization Adviser">Student Organization Adviser</option>
                  </select>
                </div>
                @if ($errors->has('designation'))
                <div id="designation-error" class="error text-danger pl-3" for="designation" style="display: block;">
                  <strong>{{ $errors->first('designation') }}</strong>
                </div>
                @endif

                <!-- School -->
                <div class="form-group">
                  <select name="school" class="form-control" value="{{ old('school') }}" required>
                    <option value="" disabled selected>School</option>
                    <option value="School of Architecture, Fine Arts and Design">Faculty</option>
                  </select>
                </div>
                @if ($errors->has('school'))
                <div id="school-error" class="error text-danger pl-3" for="school" style="display: block;">
                  <strong>{{ $errors->first('school') }}</strong>
                </div>
                @endif

                <!-- Department -->
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Department</label>
                  <input type="text" name="department" class="form-control" value="{{ old('department') }}" required>
                </div>
                @if ($errors->has('department'))
                <div id="department-error" class="error text-danger pl-3" for="department" style="display: block;">
                  <strong>{{ $errors->first('department') }}</strong>
                </div>
                @endif

                <!-- Organization -->
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Organization</label>
                  <input type="text" name="organization" class="form-control" value="{{ old('organization') }}" required>
                </div>
                @if ($errors->has('organization'))
                <div id="organization-error" class="error text-danger pl-3" for="organization" style="display: block;">
                  <strong>{{ $errors->first('organization') }}</strong>
                </div>
                @endif
              </div>
              
              <!-- Account Information -->
              <div class="col-md-6">
                <h3 class="mt-0"><strong>Account Information</strong></h3>

                <!-- Username -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">person</i>
                    </span>
                  </div>
                  <div class="form-group bmd-form-group" style="width:76%">
                    <label class="bmd-label-floating">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                  </div>
                </div>
                @if ($errors->has('username'))
                <div id="username-error" class="error text-danger pl-3" for="username" style="display: block;">
                  <strong>{{ $errors->first('username') }}</strong>
                </div>
                @endif

                <!-- Email Address -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">email</i>
                    </span>
                  </div>
                  <div class="form-group bmd-form-group" style="width:76%">
                    <label class="bmd-label-floating">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                  </div>
                </div>
                @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
                @endif

                <!-- Contact Number -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">smartphone</i>
                    </span>
                  </div>
                  <div class="form-group bmd-form-group" style="width:76%">
                    <label class="bmd-label-floating">Contact Number</label>
                    <input type="text" name="contact" class="form-control" value="{{ old('contact') }}" required>
                  </div>
                </div>
                @if ($errors->has('contact'))
                <div id="contact-error" class="error text-danger pl-3" for="contact" style="display: block;">
                  <strong>{{ $errors->first('contact  ') }}</strong>
                </div>
                @endif

                <!-- Password -->
                <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : ' has-success' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <div class="form-group bmd-form-group" style="width:76%">
                      <label class="bmd-label-floating">Password</label>
                      <input type="password" name="password" id="register_password" class="form-control" minlength="8" required>
                      <small class="form-text text-muted"> Minimum of 8 characters.</small>
                    </div>                    
                  </div>
                </div>

                <!-- Confirm Password -->
                <div class="bmd-form-group" id="confirm_password">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock</i>
                      </span>
                    </div>
                    <div class="form-group bmd-form-group" style="width:76%">
                      <label class="bmd-label-floating">Confirm password</label>
                      <input type="password" name="password_confirmation" id="register_password_confirmation" class="form-control" minlength="8" onkeyup='check();' required>
                      <small id="message" class="form-text text-danger"> </small>
                    </div>                      
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

        <!-- Create Account Button -->
        <div class="card-footer justify-content-center">
          <button type="submit" id="btnSubmit" class="btn btn-success btn-block">{{ __('Create account') }}</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form class="form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-success text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="card-title"><strong>{{ __('Forgot Password') }}</strong></h4>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : ' has-success' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
              </div>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-success btn-link btn-lg">{{ __('Send Password Reset Link') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>

  var check = function() {
    if (document.getElementById('register_password').value ==
      document.getElementById('register_password_confirmation').value) {
      document.getElementById("confirm_password").classList.remove("has-danger");
      document.getElementById("confirm_password").classList.add("has-success");
      document.getElementById("btnSubmit").disabled = false;
      document.getElementById('message').innerHTML = '';
    } else {
      document.getElementById('message').innerHTML = 'Password does not match.';
      document.getElementById("confirm_password").classList.remove("has-success");
      document.getElementById("confirm_password").classList.add("has-danger");
      document.getElementById("btnSubmit").disabled = true;
    }
  }
</script>