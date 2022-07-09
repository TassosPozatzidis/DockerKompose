
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Research LAB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="{{ route('members.all') }}">Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('publications.all') }}">Publications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('researchprojects.all') }}">Research Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('classes.all') }}">Classes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('announcements.all') }}">Announcements</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reports
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('commonpublications.all') }}">Common Publications</a>
            <a class="dropdown-item" href="{{ route('publicationsandresearch.all') }}">Member No Publications and Researches</a>
            <!--<div class="dropdown-divider"></div>-->

          </div>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Sign in</a>
        </li>
      @endif
      <li class="nav-item">
        @if(Auth::check())
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        @endif
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
    </form>
  </div>
</nav>
