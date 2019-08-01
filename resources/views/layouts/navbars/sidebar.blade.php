<div class="sidebar bg-success" data-color="orange" data-background-color="black" >
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('ACCES') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
    <div class="alert alert-success ml-3" role="alert">
      <a href="#" class="alert-link">Maria Ligaya Suico</a><br>
      Coordinator
    </div>
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">assignment</i>
            <p>{{ __('Proposals') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == '' ? ' active' : '' }}">
          <a class="nav-link" href="#">
            <span class="sidebar-mini"><i class="material-icons">assignment_turned_in</i></span>
            <span class="sidebar-normal">{{ __('Approved Proposals') }} </span>
          </a>
        </li>
        <li class="nav-item{{ $activePage == '' ? ' active' : '' }}">
          <a class="nav-link" href="#">
            <span class="sidebar-mini"><i class="material-icons">assignment_returned</i></span>
            <span class="sidebar-normal"> {{ __('Pending Proposals') }} </span>
          </a>
        </li>
      <li class="nav-item{{ $activePage == '' ? ' active' : '' }}">
        <a class="nav-link" href="#">
          <i class="material-icons">description</i>
            <p>{{ __('Reports') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('user.index') }}">
            <i class="material-icons">people</i>
            <p>{{ __('User Management') }}</p>
          </a>
        </li>
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
      </li>
    </ul>
  </div>
</div>