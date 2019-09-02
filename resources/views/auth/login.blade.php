<?php
$schools = DB::table('schools')->get();

$designations = DB::table('designations')
  ->whereIn('id', array(1, 2, 3, 4))
  ->get();

$organizations = DB::table('organizations')->get();
?>

<!-- Preloader -->
<div class="loader"></div>

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
    background: url('images/gradient.gif') 50% 50% no-repeat rgb(249, 249, 249);
  }

  .loader img {
    position: relative;
    left: 40%;
    top: 40%;
  }

  .navbar {
    transition: 0.4s;
  }

  html{
    scroll-behavior: smooth;
  }
</style>

@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('ACCES')])
@section('content')

<title>ACCES - Welcome!</title>

<div class="container" style="height: auto;" id="login">
  <div class="row align-items-center" style="margin-top:5%">
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
          <a href="#" class="text-white" data-toggle="modal" data-target="#exampleModal">
            <small>Don't have an account?</small>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center" style="background:white; margin-top:10%" id="about">
      <div data-aos="fade-up" data-aos-duration="2000">
        <img src="images/landing_page/uscces_logo.png" style="
        width: 70%;
        height: auto;
        display: block;
        margin-left:auto;
        margin-right:auto;
        ">
      </div>
      <div data-aos="fade-up" data-aos-duration="2000">
        <h1 class="text-dark" style='font-weight: 900; margin-top: 1%'>What is <strong style="color:forestgreen">Community Extension Service</strong>?</h1>
      </div>
      <div class="ml-5 mr-5">
        <div data-aos="fade-up" data-aos-duration="2000">
          <hr />
          <h3 class="text-dark mb-5"><strong>Community Extension Service</strong> (CES) is one of the three core functions of the
            <strong>University of San Carlos</strong> (USC) as a Higher Education Institution along with <strong>Teaching-Learning</strong>
            and <strong>Research</strong>. Hence, Carolinians experience integral development by advancing their academic
            competencies highly motivated by their active engagements with university partner communities, institutions, and
            organizations. All Community Extension Service programs, projects, and activities are undertaken by students,
            faculty, and staff with a three-fold mandate: <strong>first</strong>, to voluntarily extend one’s professional and
            academic expertise; <strong>second</strong>, to engage into prophetic dialogue with the world guided by the
            Missionary charisma of Societas Verbi Divini (SVD) Spirituality; and <strong>third</strong>, to empower peoples
            and communities for social change through a transformatory or liberational approach.</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:8%; padding-left:15%" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-sine">
      <h1 style='font-weight: 900'>OBJECTIVES</h1>
    </div>
    <div class="col-md-6 mt-5" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-sine">
      <h4><strong>&bull;</strong> Extension services are integral to the learning experience and research opportunities of students.</h4>
      <h4><strong>&bull;</strong> Faculty members conduct CES as an enrichment to the teaching-research experience.</h4>
      <h4><strong>&bull;</strong> Alumni take an active role in the conduct of CES programs and projects.</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mt-5 text-right" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-sine">
      <h4>For USC to contribute to nation building by providing highly specialized curricular programs with extension services that allow students, faculty, and staff to apply the new knowledge they generate by empowering communities, organizations, and institutions through a transformatory approach in addressing specific social development problems.</h4>
    </div>
    <div class="col-md-6" style="margin-top:8%; padding-right:15%" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-sine">
      <h1 style='font-weight: 900'>GOALS</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6" style="margin-top:10%; padding-left:5%" data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-sine">
      <h1 style='font-weight: 900'>KEY RESULT AREA</h1>
    </div>
    <div class="col-md-6 mt-5" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-sine">
      <h4><strong>&bull;</strong> Context-responsive CES programs and projects.</h4>
      <h4><strong>&bull;</strong> Specialization-based CES by faculty and students.</h4>
      <h4><strong>&bull;</strong> Collaborative and inclusive conduct of CES by academic as well as administrative units.</h4>
      <h4><strong>&bull;</strong> Sustainable and outcomes-based CES programs and projects.</h4>
      <h4><strong>&bull;</strong> Development of Voluntarism and Missionary Orientation among faculty, students, and staff.</h4>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center" style="background:white; margin-top:10%">
      <div data-aos="fade-up" data-aos-duration="2000">
        <h2 class="text-dark" style='margin-top: 5%'>Our Inspiration</h2>
      </div>
      <div data-aos="fade-up" data-aos-duration="2000">
        <h1 class="text-warning" style='font-weight: 900; margin-top: 1%'>SVD Charism and Congregational Directions</h1>
      </div>
      <div class="ml-5 mr-5">
        <div data-aos="fade-up" data-aos-duration="2000">
          <hr />
          <h3 class="text-dark mb-5">As an SVD-run and managed institution, the <strong>University of San Carlos</strong> subscribes to
            the <strong>Missionary Charism</strong> and <strong>Congregational Directions</strong> of the <strong>SVD General Chapter</strong>. This intended to guide the
            spirituality of the university as it dialogues with its context - a contribution of USC to the shaping of
            local communities. Shown below are the two general chapters of SVD that serve as a guide of its Congregational
            Directions, the very same spirituality steering the conduct of community extension services to partner
            communities, institutions, and organizations.</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6" style="background:white">
      <div data-aos="fade-up" data-aos-duration="2000">
        <img src="images/landing_page/svd_gc1.png" style="
          width: 100%;
          height: auto;
          display: block;
          margin-left:auto;
          margin-right:auto;
          ">
      </div>
    </div>
    <div class="col-md-6" style="background:white">
      <div data-aos="fade-up" data-aos-duration="2000">
        <img src="images/landing_page/svd_gc2.png" style="
          width: 100%;
          height: auto;
          display: block;
          margin-left:auto;
          margin-right:auto;
          ">
      </div>
    </div>
  </div>
</div>

<div class="container text-center" id="contact">
  <div class="row">
    <div class="col-md-12 text-center" style="margin-top:5%">
      <div data-aos="fade-down" data-aos-duration="2000">
        <h1 style='font-weight: 900'>Contact Us</h1>
      </div>
      <div class="ml-5 mr-5">
        <div data-aos="fade-down" data-aos-duration="2000">
          <hr class="bg-white" />
        </div>
        <div data-aos="fade-down" data-aos-duration="2000">
          <h3><i class="fa fa-map-marker"></i> P. Del Rosario Street, Cebu City, Philippines 6000</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 mt-5 mb-2" data-aos="fade-right" data-aos-duration="2000">
      <h3><i class="fa fa-phone"></i> <strong>TELEPHONE</strong></h3>
      <h3>+63 (32) 253 - 1000 local 196</h3>
      <h3>+63 (32) 230 - 0100 local 549</h3>
    </div>
    <div class="col-md-4 mt-5 mb-2" data-aos="fade-down" data-aos-duration="2000">
      <h3><i class="fa fa-fax"></i> <strong>FAX MACHINE</strong></h3>
      <h3>+63 (32) 255 - 4341</h3>
      <h3>+63 (32) 253 - 8895</h3>
    </div>
    <div class="col-md-4 mt-5 mb-2" data-aos="fade-left" data-aos-duration="2000">
      <h3><i class="fa fa-envelope"></i> <strong>E-MAIL ADDRESS</strong></h3>
      <h3>usc.cesoffice@gmail.com</h3>
      <h3>ces@usc.edu.ph</h3>
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
                    <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}" pattern="[a-zA-Z][a-zA-Z ]{1,}" required>
                  </div>

                  <!-- Last Name -->
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Last name</label>
                    <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" pattern="[a-zA-Z][a-zA-Z ]{1,}" required>
                  </div>

                  <!-- Designation -->
                  <div class="form-group">
                    <select class="browser-default custom-select" name="designation" required>
                      <option disabled selected value="">Designation</option>
                      @foreach($designations as $designation)
                      <option value="{{$designation->id}}">{{$designation->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <!-- School -->
                  <div class="form-group">
                    <select id="school_dropbox" name="school" class="browser-default custom-select" required>
                      <option disabled selected value="">School</option>
                      @foreach($schools as $school)
                      <option value="{{$school->id}}">{{$school->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <!-- Department -->
                  <div class="form-group">
                    <select id="department_dropbox" name="department" class="browser-default custom-select" required>
                      <option disabled selected value="">Department</option>
                    </select>
                  </div>

                  <!-- Organization -->
                  <div class="form-group">
                    <select name="organization" class="browser-default custom-select" required>
                      <option disabled selected value="">Organization</option>
                      @foreach($organizations as $organization)
                      <option value="{{$organization->id}}">{{$organization->name}}</option>
                      @endforeach
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
                      <input type="number" name="contact" class="form-control" value="{{ old('contact') }}" required>
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
        @csrf
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
  window.onload = function() {
    // loader on page load     
    $(window).scrollTop(0);
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

  $(document).ready(function() {
    AOS.init();
    // Transition effect for navbar 
    $(window).scroll(function() {
      // checks if window is scrolled more than 80px, adds/removes solid class
      if ($(this).scrollTop() > 50) {
        $('.navbar').removeClass('navbar-transparent');
        $('.navbar').attr('style', 'background: forestgreen !important');
        console.log("good!");
      } else {
        $('.navbar').addClass('navbar-transparent');
        $('.navbar').attr('style', 'background: none !important');
      }
    });
  });


  //Dynamic department dropbox
  $("#school_dropbox").change(function() {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: '/getDepartments',
      data: {
        id: $("#school_dropbox").val()
      },
      success: function(data) {
        var options = '<option disabled selected value="">Department</option>';

        $.each(data.departments, function(key, value) {
          options += '<option value="' + value.id + '">' + value.name + '</option>';
        });

        $("#department_dropbox").html(options);
      }
    });
  });
</script>