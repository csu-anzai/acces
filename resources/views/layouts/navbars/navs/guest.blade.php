<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <div class="navbar-brand">
        <img src="../../images/usc_logo.png" style="
        width: 100%;
        max-width: 225px;
        height: auto;
        display: block;
        margin-left:auto;
        margin-right:auto;
        ">
      </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="material-icons">person_add</i> {{ __('Register') }}
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'about' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="material-icons">info</i> {{ __('About') }}
          </a>
        </li>
        <li class="nav-item ">
          <a href="{{ route('profile.edit') }}" class="nav-link">
            <i class="material-icons">phone</i> {{ __('Contact') }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->