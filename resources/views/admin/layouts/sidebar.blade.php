<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{Route('admin.dashboard')}} "><img src="{{asset ('admin/assets/images/logo.svg')}}" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="{{Route('admin.dashboard')}} "><img src="{{asset ('admin/assets/images/logo-mini.svg')}}" alt="logo" /></a>
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
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
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
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <span class="menu-icon">
            <i class="mdi mdi-chart-bar"></i>
          </span>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="pages/icons/mdi.html">
          <span class="menu-icon">
            <i class="mdi mdi-contacts"></i>
          </span>
          <span class="menu-title">Icons</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <span class="menu-icon">
            <i class="mdi mdi-security"></i>
          </span>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
</nav>