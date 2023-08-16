<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="">
            <img class="avatar-lg" src="{{ asset('assets/images/logo.png') }}" alt="profile image"> </div>
          {{-- <div class="text-wrapper">
            <p class="profile-name">{{ Auth::user()->name }}</p>
            <div>
              <small class="designation text-muted">{{ Auth::user()->role->name }}</small>
              <span class="status-indicator online"></span>
            </div>
          </div> --}}
        </div>
        {{-- <button class="btn btn-success btn-block">New Project
          <i class="mdi mdi-plus"></i>
        </button> --}}
        <div class="role">
          <small class="designation badge badge-{{ Auth::user()->label() }}">{{ Auth::user()->role->name }}</small>
          {{-- <span class="status-indicator online"></span> --}}
        </div>
      </div>
    </li>

    <li class="nav-item {{ active_path() }}">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!-- User management -->
    <li class="nav-item {{ active_segment(2, 'users') }}">
      <a class="nav-link" data-toggle="collapse" href="#user-dropdown" aria-expanded="false" aria-controls="user-dropdown">
        <i class="menu-icon mdi mdi-account-group"></i>
        <span class="menu-title">Manage User</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_segment(2, 'users') }}" id="user-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ active_path('users') }}" href="{{ route('users.index') }}">User List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_path('users/create') }}" href="{{ route('users.create') }}">Add New User</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Banner management -->
    <li class="nav-item {{ active_segment(2, 'banners') }}">
      <a class="nav-link" data-toggle="collapse" href="#banner-dropdown" aria-expanded="false" aria-controls="banner-dropdown">
        <i class="menu-icon fa fa-image"></i>
        <span class="menu-title">Manage Banner</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_segment(2, 'banners') }}" id="banner-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ active_path('banners') }}" href="{{ route('banners.index') }}">Banner List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_path('banners/create') }}" href="{{ route('banners.create') }}">Add New Banner</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Blog management -->
    <li class="nav-item {{ active_segment(2, 'blogs') }}">
      <a class="nav-link" data-toggle="collapse" href="#blog-dropdown" aria-expanded="false" aria-controls="blog-dropdown">
        <i class="menu-icon fa fa-newspaper-o"></i>
        <span class="menu-title">Manage Blog</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_segment(2, 'blogs') }}" id="blog-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ active_path('blogs') }}" href="{{ route('blogs.index') }}">Blog List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_path('blogs/create') }}" href="{{ route('blogs.create') }}">Add New Blog</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Channel management -->
    <li class="nav-item {{ active_segment(2, 'channels') }}">
      <a class="nav-link" data-toggle="collapse" href="#channel-dropdown" aria-expanded="false" aria-controls="channel-dropdown">
        <i class="menu-icon fa fa-globe"></i>
        <span class="menu-title">Manage Channel</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_segment(2, 'channels') }}" id="channel-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ active_path('channels') }}" href="{{ route('channels.index') }}">Channel List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_path('channels/create') }}" href="{{ route('channels.create') }}">Add New Channel</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- League management -->
    <li class="nav-item {{ active_segment(2, 'leagues') }}">
      <a class="nav-link" data-toggle="collapse" href="#league-dropdown" aria-expanded="false" aria-controls="league-dropdown">
        <i class="menu-icon fa fa-trophy"></i>
        <span class="menu-title">Manage League</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_segment(2, 'leagues') }}" id="league-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ active_path('leagues') }}" href="{{ route('leagues.index') }}">League List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_path('leagues/create') }}" href="{{ route('leagues.create') }}">Add New League</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Teams management -->
    <li class="nav-item {{ active_segment(2, 'teams') }}">
      <a class="nav-link" data-toggle="collapse" href="#team-dropdown" aria-expanded="false" aria-controls="team-dropdown">
        <i class="menu-icon fa fa-users"></i>
        <span class="menu-title">Manage Team</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_segment(2, 'teams') }}" id="team-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ active_path('teams') }}" href="{{ route('teams.index') }}">Team List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_path('teams/create') }}" href="{{ route('teams.create') }}">Add New Team</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Game management -->
    <li class="nav-item {{ active_segment(2, 'games') }}">
      <a class="nav-link" data-toggle="collapse" href="#game-dropdown" aria-expanded="false" aria-controls="game-dropdown">
        <i class="menu-icon fa fa-futbol-o"></i>
        <span class="menu-title">Manage Game</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_segment(2, 'games') }}" id="game-dropdown">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ active_path('games') }}" href="{{ route('games.index') }}">Game List</a>
          </li><li class="nav-item">
            <a class="nav-link {{ active_path('results') }}" href="{{ route('results.index') }}">Result</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_path('games/create') }}" href="{{ route('games.create') }}">Add New Game</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Setting -->
    <li class="nav-item {{ active_path('setting') }}">
      <a class="nav-link" href="{{ route('setting.index') }}">
        <i class="menu-icon fa fa-cogs"></i>
        <span class="menu-title">Setting</span>
      </a>
    </li>
    
  </ul>
</nav>