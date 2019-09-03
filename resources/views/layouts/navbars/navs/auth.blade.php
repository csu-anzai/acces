<style>
  .dropdown-item:hover {
    background-color: orange !important;
  }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="#">{{ $titlePage }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form class="navbar-form">
        <div class="input-group no-border has-success">
        <input type="text" value="" class="form-control" placeholder="Search...">
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
        </div>
      </form>
      <ul class="navbar-nav">
        <li class="nav-item dropdown" id="notification-part">
          @if(!Auth::user()->unreadNotifications->isEmpty())
          <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">notifications</i>
            <span class="notification" id="notification-full">{{count(Auth::user()->unreadNotifications)}}</span>
            <p class="d-lg-none d-md-block">
              {{ __('notifications') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            @foreach(Auth::user()->unreadNotifications as $notification)   
            <a class="dropdown-item" href="#">
              {{$notification->data['firstname']}} 
              {{$notification->data['lastname']}} 
              forwarded your proposal. 
              &nbsp
              <small>{{$notification->created_at->diffForHumans()}}</small>
            </a>  
            @endforeach
          </div>
          @else
          <a class="nav-link" href="markAsRead" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">notifications</i>
            <span class="notification" id="notification-empty" hidden></span>
            <p class="d-lg-none d-md-block">
              {{ __('Some Actions') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">You have no notifications.</a>  
          @endif
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            <a class="dropdown-item" href="#">{{ __('Settings') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script type="text/javascript">

//notifications will be marked as read on clicking
$("#navbarDropdownMenuLink").click(function(){  
  $('.notification').fadeOut();
  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "/markAsRead",
    type: "POST",
    success: function(result){
        console.log("good!");
    },
    error: function(xhr, resp, text){
        console.log(xhr, resp, text);
    }
  });
});

      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;

      var pusher = new Pusher('3e85f19a74e16a51033f', {
        cluster: 'ap1',
        forceTLS: true
      });

      var channel = pusher.subscribe('proposal-channel');

      var notificationCount = 0;
      var temporary = $("#notification-full").html();

      channel.bind('forwarded-proposal', function(data) {
        
        if(data['creator_id'] == $("#user-id").html()){

          notificationCount++;

          $("#notification-empty").removeAttr('hidden');
          $("#notification-empty").html(notificationCount);
          $("#notification-full").html(parseInt(temporary)+notificationCount);

          $.notify({
              icon: "add_alert",
              message: "<strong>"+data['username']+"</strong> has forwarded your proposal."
          },{
              type: 'success',
              timer: 4000,
              placement: {
                  from: 'top',
                  align: 'right'
              }
          });

        }

      });

    </script>