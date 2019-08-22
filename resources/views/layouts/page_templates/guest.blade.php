<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" style="background: limegreen; align-items: center;" data-color="limegreen">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @include('layouts.navbars.navs.guest')
    @yield('content')
    @include('layouts.footers.guest')
  </div>
</div>
