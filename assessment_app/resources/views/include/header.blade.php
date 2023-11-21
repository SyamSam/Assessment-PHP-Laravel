<!--Header Design Navigation Bar-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      @if (Auth::check())
        Hello {{ Auth::user()->name }}
      @else
        Laravel
      @endif
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ">
        <a class="nav-link active" aria-current="page" href="/">Laravel Home</a>
        <!--Not logged in it will show-->
        @guest 
            <a class="nav-link" href="/login">Login</a>
            <a class="nav-link" href="/register">Register</a>
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        @endguest
        
        <!--when logged in it will show-->
        @auth
            <a class="nav-link" href="{{ route('home') }}">Home</a>
            <a class="nav-link" href="{{ route('home-post') }}">Post</a>
            
            

        @endauth
        </div>  

        <div class="navbar-nav ms-auto"> <!--Pushing the Nav to the right by margin auto-->
        @auth
        <a class="nav-link" href="{{ route('edit-profile', Auth::user()->id) }}">Edit Profile</a>
        <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
        @endauth
        </div>
    </div>
  </div>
</nav>
