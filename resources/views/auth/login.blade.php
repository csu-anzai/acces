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

                <!-- Last Name -->
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating">Last name</label>
                  <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" required>
                </div>

                <!-- Designation -->
                <div class="form-group">
                  <select class="form-control" name="designation" value="{{ old('designation') }}" required>
                    <option disabled selected>Designation</option>
                    <option value="Co-Curricular Organization">Co-Curricular Organization</option>
                    <option value="Extra-Curricular Organization">Extra-Curricular Organization</option>
                    <option value="Faculty">Faculty</option>
                    <option value="Student Organization Adviser">Student Organization Adviser</option>
                  </select>
                </div>
                
                <!-- School -->
                <div class="form-group">
                  <select name="school" class="form-control" value="{{ old('school') }}" required>
                    <option disabled selected>School</option>
                    <option value="School of Architecture, Fine Arts and Design">School of Architecture, Fine Arts and Design</option>
                    <option value="School of Arts and Sciences">School of Arts and Sciences</option>
                    <option value="School of Education">School of Education</option>
                    <option value="School of Health Care Professions">School of Health Care Professions</option>
                    <option value="School of Law and Governance">School of Law and Governance</option>
                    <option value="School of Business and Economics">School of Business and Economics</option>
                    <option value="School of Engineering">School of Engineering</option>
                    <option value="Extra-Curricular">Extra-Curricular</option>
                  </select>
                </div>

                <!-- Department -->
                <div class="form-group">
                  <select name="department" class="form-control" value="{{ old('department') }}" required>
                    <option disabled selected>Department</option>
                    <option disabled>--School of Architecture, Fine Arts and Design--</option>
                    <option value="Architecture">Architecture</option>
                    <option value="Fine Arts">Fine Arts</option>
                    <option disabled>--School of Arts and Sciences--</option>
                    <option value="Languages and Literature">Languages and Literature</option>
                    <option value="Philosophy and Religious Studies">Philosophy and Religious Studies</option>
                    <option value="Psychology">Psychology</option>
                    <option value="Anthropology, Sociology and History">Anthropology, Sociology and History</option>
                    <option value="Biology">Biology</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Computer and Information Sciences">Computer and Information Sciences</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option disabled>--School of Education--</option>
                    <option value="Teacher Education">Teacher Education</option>
                    <option value="Science and Mathematics">Science and Mathematics</option>
                    <option value="Physical Education">Physical Education</option>
                    <option disabled>--School of Health Care Professions--</option>
                    <option value="Nursing">Nursing</option>
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="Nutrition and Dietics">Nutrition and Dietics</option>
                    <option disabled>--School of Law and Governance--</option>
                    <option value="Law">Law</option>
                    <option value="Political Science">Political Science</option>
                    <option disabled>--School of Business and Economics--</option>
                    <option value="Accountancy">Accountancy</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Economics">Economics</option>
                    <option value="Hospitality Management">Hospitality Management</option>
                    <option disabled>--School of Engineering--</option>
                    <option value="Chemical Engineering">Chemical Engineering</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Computer Engineering">Computer Engineering</option>
                    <option value="Electronics and Communications Engineering">Electronics and Communications Engineering</option>
                    <option value="Industrial Engineering">Industrial Engineering</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option disabled>--Extra Curricular--</option>
                    <option value="Extra Curricular">Extra Curricular</option>                                                           
                  </select>
                </div>

                <!-- Organization -->
                <div class="form-group">
                  <select name="organization" class="form-control" value="{{ old('organization') }}" required>
                    <option disabled selected>Organization</option>
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

</script>