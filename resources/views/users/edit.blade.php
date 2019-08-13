@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-success">
                <h4 class="card-title">{{ __('Edit User') }}</h4>
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
                    <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" id="input-firstname" type="text" placeholder="{{ __('First Name') }}" value="{{ old('firstname', $user->firstname) }}" required="true" aria-required="true"/>
                      @if ($errors->has('firstname'))
                        <span id="firstname-error" class="error text-danger" for="input-firstname">{{ $errors->first('firstname') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Last Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" id="input-lastname" type="text" placeholder="{{ __('Last Name') }}" value="{{ old('lastname', $user->lastname) }}" required="true" aria-required="true"/>
                      @if ($errors->has('lastname'))
                        <span id="lastname-error" class="error text-danger" for="input-lastname">{{ $errors->first('lastname') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Contact Number') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('contact') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" id="input-contact" type="text" placeholder="{{ __('Contact Number') }}" value="{{ old('contact', $user->contact) }}" required="true" aria-required="true"/>
                      @if ($errors->has('contact'))
                        <span id="contact-error" class="error text-danger" for="input-contact">{{ $errors->first('contact') }}</span>
                      @endif
                    </div>
                  </div>
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
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection