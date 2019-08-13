<?php
  $schools = DB::table('schools')->get();

  $designations = DB::table('designations')
    ->whereIn('id', array(1, 2, 3, 4))
    ->get();
?>

<!-- Preloader -->
<div class="loader" ></div>

<!-- Preloader CSS -->
<style>
.loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: white;
            background: url('../images/gradient.gif') 50% 50% no-repeat rgb(249,249,249);
        }
        .loader img{
            position: relative;
            left: 40%;
            top: 40%;
        }
</style>

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
          <a href="#" class="text-white" data-toggle="modal" data-target="#forgotPassword">
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

                <!-- Last Name -->
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Last name</label>
                  <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" required>
                </div>

                <!-- Designation -->
                <div class="form-group">
                  <select class="form-control" name="designation" value="{{ old('designation') }}" required>
                    <option disabled selected value="">Designation</option>
                    @foreach($designations as $designation)
                    <option value="{{$designation->id}}">{{$designation->name}}</option>
                    @endforeach
                  </select>
                </div>
                
                <!-- School -->
                <div class="form-group">
                  <select id="school_dropbox" name="school" class="form-control" value="{{ old('school') }}" required>
                    <option disabled selected value="">School</option>
                    @foreach($schools as $school)
                    <option value="{{$school->id}}">{{$school->name}}</option>
                    @endforeach
                  </select>
                </div>

                <!-- Department -->
                <div class="form-group">
                  <select id="department_dropbox" name="department" class="form-control" value="{{ old('department') }}" required>
                    <option disabled selected value="">Deparment</option>                       
                  </select>
                </div>

                <!-- Organization -->
                <div class="form-group">
                  <select name="organization" class="form-control" value="{{ old('organization') }}" required>
                    <option disabled selected value="">Organization</option>
                    <option value="None">None</option>
                    <option value="Catholic Charismatic Carolinians">Catholic Charismatic Carolinians</option>
                    <option value="Supreme Student Council">Supreme Student Council</option>
                    <option value="USC-Chemical Engineering Council">USC-Chemical Engineering Council</option>
                    <option value="USC Electronics Engineering Council">USC Electronics Engineering Council</option>
                    <option value="Sophia Organization">Sophia Organization</option>
                    <option value="Psychology Society">Psychology Society</option>
                    <option value="Electrical Engineering Council">Electrical Engineering Council</option>
                    <option value="Computer Engineering Council">Computer Engineering Council</option>
                    <option value="Junior Philippine Pharmacists Association ">Junior Philippine Pharmacists Association</option>
                    <option value="Science Education Students Organization">Science Education Students Organization</option>
                    <option value="Datalogics Society">Datalogics Society</option>
                    <option value="Industrial Engineering Council">Industrial Engineering Council</option>
                    <option value="Mechanical Engineering Council">Mechanical Engineering Council</option>
                    <option value="Civil Engineering Council">Civil Engineering Council</option>
                    <option value="Collegiate Engineering Council">Collegiate Engineering Council</option>
                    <option value="Carolinian Physics Society">Carolinian Physics Society</option>
                    <option value="Manufacturing Engineering Council">Manufacturing Engineering Council</option>
                    <option value="Carolinian Library and Information Science Association">Carolinian Library and Information Science Association</option>
                    <option value="USC Architecture Society">USC Architecture Society</option>
                    <option value="Integrated Students of the Interior Design Education">Integrated Students of the INterior Design Education</option>
                    <option value="Solares">Solares</option>
                    <option value="Nutrition and Dietetics Student Organization">Nutrition and Dietetics Student Organization</option>
                    <option value="Nursing Student Body Organization">Nursing Student Body Organization</option>
                    <option value="Dynamic Communication Society">Dynamic Communication Society</option>
                    <option value="Biology Integrated Organization">Biology Integrated Organization</option>
                    <option value="Chemistry Student Association">Chemistry Student Association</option>
                    <option value="Students Electronic Society">Solares</option>
                    <option value="Amateur Radio Club">Amateur Radio Club</option>
                    <option value="Movir Engineering Society">Movir Engineering Society</option>
                    <option value="Pathways">Pathways</option>
                    <option value="Chemical Engineering Society">Chemical Engineering Society</option>
                    <option value="Society of Circuit Researchers">Society of Circuit Researchers</option>
                    <option value="Computer Driven Enthusiasts">Computer Driven Enthusiasts</option>
                    <option value="Association of Civil Engineering Students">Association of Civil Engineering Students</option>
                    <option value="Philippine Institute of Civil Engineers">Philippine Institute of Civil Engineers</option>
                    <option value="USC Medics">USC Medics</option>
                    <option value="Junior People Management Association of the Philippines">Junior People Management Association of the Philippines</option>
                    <option value="Carolinian Residents Association">Carolinian Residents Association</option>
                    <option value="Youth For Christ">Youth For Christ</option>
                    <option value="Safety First">Safety First</option>
                    <option value="Rotarac Club of Cebu">Rotarac Club of Cebu</option>
                    <option value="Philippine Junior Jaycees Inc. - USC Chapter">Philippine Junior Jaycees Inc. - USC Chapter</option>
                    <option value="Carolinian Economics Society">Carolinian Economics Society</option>
                    <option value="School of Education Council">School of Education Council</option>
                    <option value="CAWSA">CAWSA</option>
                    <option value="Junior Financial Executives">Junior Financial Executives</option>
                    <option value="Carolinian Political Science">Carolinian Political Science</option>
                    <option value="Junior Philippine Institute of Accountants - USC Chapter">Junior Philippine Institute of Accountants - USC Chapter</option>
                    <option value="SHOTS">SHOTS</option>
                    <option value="PJJJI">PJJJI</option>
                    <option value="CES OFFICE">CES OFFICE</option>
                    <option value="Red Cross Youth - USC Council">Red Cross Youth - USC Council</option>
                  </select>
                </div>

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
<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <!-- Reset password form -->
      <form class="text-center border border-light p-5 has-success" method="POST" action="{{ route('password.email') }}">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>

          <p class="h3 mb-4"><strong>Password Reset</strong></p>

          <p>Enter your email address so we could send a link to recover your password.</p>

          <!-- Email -->
          <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">

          <!-- Sign in button -->
          <button class="btn btn-success btn-block" type="submit">{{ __('Send Password Reset Link') }}</button>

      </form>
      <!-- Reset password form -->

    </div>
  </div>
</div>

<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
<script>
  //Preloader
  window.onload = function(){
    // loader on page load 
    $('.loader').fadeOut();
  }

  // Password confirmation
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
        var options = '<option disabled selected value="">Deparment</option>';
        
        $.each(data.departments, function(key, value){
          options += '<option value="'+value.id+'">'+value.name+'</option>';
        });

        $("#department_dropbox").html(options);
      }
    });
  });

</script>