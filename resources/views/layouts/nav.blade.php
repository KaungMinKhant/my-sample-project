<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">S O C I A L I T E</a>

  @if (Auth::check())
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      
      

      

      

      <li class="dropdown">
        <button href="#" onclick="myFunction()" class="nav-link dropdown-toggle dropbtn bg-dark">
          Content
        </button>
        <div id="myDropdown" class="dropdown-content">
          <a href="/widget">Widgets</a>
          @if (Auth::check() && Auth::user()->isAdmin())
          <a href="/user">Users</a>
          <a href="/profile">Profiles</a>
          <a href="/marketing-image">Marketing Images</a>
          @endif
        </div>
      </li>
      
    </ul>
    @endif
    <ul class="navbar-nav ">
      @if (Auth::check())
      <li class="dropdown">
        <button href="#" onclick="myFunction2()" class="nav-link dropdown-toggle dropbtn2 bg-dark">
          {{ Auth::user()->name }}
        </button>
        <div id="myDropdown2" class="dropdown-content2">
          <a href="/determine-profile-route">Profile</a>
          <a href="/settings">Settings</a>
          @if(Auth::user()->isAdmin())
          <a href="/admin">Admin</a>
          @endif
          <a href="/logout"onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          Logout
        </a>

        <form id="logout-form" action="/logout" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
        <li class="nav-item image-control"><img class="circ" src="{{ \Gravatar::get(\Auth::user()->email)  }}"></li>
      </div>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="/login">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/register">Register</a>
    </li>
    @endif
  </ul>
</div>

</nav> 
