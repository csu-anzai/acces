@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('ACCES')])
@section('content')

<title>ACCES - Welcome!</title>

<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-7 ml-auto mr-auto">

      {{-- Insert logo here --}}

      <h3 class="display-1 font-weight-bold mb-0" style="">ACCES</h3>
      <h4 class="lead">Access Center for Community Extension Services</h4>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-5 ml-auto mr-auto">

      {{-- Login form --}}
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card card-login card-hidden mb-3">
          <div class="card-body">
            <p class="card-description text-center">Sign in to your account.</p>
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
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : ' has-success' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
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

      {{-- Forgot password --}}
      <div class="row">
        <div class="col-6">
            @if (Route::has('password.request'))
              <a href="#" class="text-white" data-toggle="modal" data-target="#exampleModal2">
                  <small>Forgot password?</small>
              </a>
            @endif
        </div>

        {{-- Registration --}}
        <div class="col-6 text-right">
            <a href="#" class="text-white" data-toggle="modal" rel="tooltip" title="For Co-curricular and Extra-curricular Student Organization Representatives, Student Organization Adviser, and Faculty." data-target="#exampleModal">
                <small>Don't have an account?</small>
            </a>
        </div>
      </div>  
    </div>
  </div>
</div>
@endsection

{{-- Registration Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form class="form" method="POST" action="{{ route('register') }}">
            @csrf
              <div class="card-body ">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <p>For Co-curricular and Extra-curricular Student Organization Representatives, Student Organization Adviser, and Faculty.</p>
                  <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : ' has-success' }}">
                    <div class="input-group">
                      <div class="input-group-prepend">
                       <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                      </div>
                      <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required>
                    </div>
                    @if ($errors->has('name'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                      <strong>{{ $errors->first('name') }}</strong>
                    </div>
                    @endif
                  </div>
                  <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : ' has-success' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                       <span class="input-group-text">
                         <i class="material-icons">email</i>
                       </span>
                      </div>
                      <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : ' has-success' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
                  </div>
                  @if ($errors->has('password'))
                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                      <strong>{{ $errors->first('password') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : ' has-success' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
                  </div>
                  @if ($errors->has('password_confirmation'))
                    <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </div>
                  @endif
                </div>
              </div>
              <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-success btn-block">{{ __('Create account') }}</button>
              </div>
          </form>

    </div>
  </div>
</div>

{{-- Forgot Password Modal --}}
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
  