<?php
  $user = \App\User::find(Auth::user()->id);

  $result = $user::with('designation')->first();
  
  $pending_ids = [1, 2, 3, 4, 5]
?>

<div class="sidebar bg-success" data-color="orange" data-background-color="black">
  <div class="logo">
    <img src="../../images/logo_main.png" style="
      width: 100%;
      max-width: 225px;
      height: auto;
      display: block;
      margin-left:auto;
      margin-right:auto;
      ">
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <div class="alert alert-{{ $activePage == 'profile' ? 'warning' : 'success' }} ml-3" role="alert">
        <a href="{{ route('profile.edit') }}" class="alert-link mb-3">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</a>
        <div>{{$result->designation->name}}</div>    
      </div>
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">assignment</i>
          <p>{{ __('Proposals') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == '' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">description</i>
          <p>{{ __('Reports') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == '' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <span class="sidebar-mini"><i class="material-icons">assignment_turned_in</i></span>
          <span class="sidebar-normal">{{ __('Approved Proposals') }} </span>
        </a>
      </li>

      @if(in_array(Auth::user()->id, $pending_ids) == false)
      <li class="nav-item{{ $activePage == '' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <span class="sidebar-mini"><i class="material-icons">assignment_returned</i></span>
          <span class="sidebar-normal"> {{ __('Pending Proposals') }} </span>
        </a>
      </li> 
      @endif

      @if(Auth::user()->designation_id == 11)
      <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">people</i>
          <p>{{ __('User Management') }}</p>
        </a>
      </li>
      @endif

      <!--
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li> -->
    </ul>
  </div>
</div>