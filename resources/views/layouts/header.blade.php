<header class="main-header">
  <a href="{{url('/')}}" class="logo">
    <span class="logo-mini"><b>ADMIN</b></span>
    <span class="logo-lg"><b>Administrator</span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <?php
    $picture = Auth::user()->picture;
    ?>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if($picture)
              <img src="{{ URL::asset('pictures/'.$picture)}}" class="user-image" alt="{{Auth::user()->name}}">
            @else
              <img src="{{URL::asset('dist/img/avatar2.png')}}" class="user-image" alt="User Image">
            @endif
            <span class="hidden-xs">{{Auth::user()->name}}</span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              @if($picture)
                <img src="{{ URL::asset('pictures/'.$picture)}}" class="img-circle" alt="{{Auth::user()->name}}">
              @else
                <img src="{{URL::asset('dist/img/avatar2.png')}}" class="img-circle" alt="User Image">
              @endif
              <p>
                {{Auth::user()->name}} -
              </p>
            </li>

            <li class="user-footer">
              <div class="pull-left">
                <a href="{{url('profil')}}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                {{-- <a href="#" class="btn btn-default btn-flat">Sign out</a> --}}
                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
                    data-placement="bottom" >
                    Sign out</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
