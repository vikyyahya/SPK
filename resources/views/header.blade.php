<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- SEARCH FORM -->


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <div class="user-panel d-flex">
      <div class="image">
        <img src="{{asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @guest
        <a class="d-block"> </a>
        @else
        <a class="d-block"> {{ Auth::user()->name }}</a>
        @endguest

      </div>
    </div>
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  </ul>
</nav>