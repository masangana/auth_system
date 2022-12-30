<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{Route('admin.dashboard')}} "><img src="{{asset ('admin/assets/images/logo.png')}}" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="{{Route('admin.dashboard')}} "><img src="{{asset ('admin/assets/images/logo-mini.png')}}" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{asset ('admin/assets/images/faces/face15.jpg')}}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
              <span>Gold Member</span>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{Route('admin.dashboard')}} ">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-home-modern"></i>
          </span>
          <span class="menu-title">Les Places</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ Route('place.index') }}">Tout Voir</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ Route('place.create') }}">Ajouter</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
          <span class="menu-icon">
            <i class="mdi mdi-google-cardboard"></i>
          </span>
          <span class="menu-title">Les Evenements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ Route('event.index') }}">Tout Voir</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ Route('event.create') }}">Ajouter</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
          <span class="menu-icon">
            <i class="mdi mdi-google-cardboard"></i>
          </span>
          <span class="menu-title">Outils</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic3">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ Route('category.index') }}">Les Categories</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ Route('type.index') }}">Les Types</a></li>
          </ul>
        </div>
      </li>
    </ul>
</nav>