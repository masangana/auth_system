<!-- Header start -->
<header id="header" class="header-two">
    <div class="site-navigation">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                  
                  <div class="logo">
                        @guest()
                        <a class="d-block" href="{{Route('index')}}">
                            <img loading="lazy" src="{{asset('user/images/logo.png')}}" alt="Constra">
                        </a>
                        @else
                            <a class="d-block" href="{{Route('home')}}">
                                <img loading="lazy" src="{{asset('user/images/logo.png')}}" alt="Constra">
                            </a>
                        @endguest
                      
                  </div><!-- logo end -->
  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  
                  <div id="navbar-collapse" class="collapse navbar-collapse">
                      <ul class="nav navbar-nav ml-auto align-items-center">
                        <li class="nav-item dropdown active">
                            <a href="{{Route('user.dashboard')}}" class="nav-link dropdown-toggle">Lieux </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="{{Route('events.index')}}" class="nav-link dropdown-toggle">Events </a>
                        </li>
                
                        <li class="nav-item dropdown">
                            <a href="{{Route('services.filter')}}" class="nav-link dropdown-toggle" >Services </a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{Route('contact.mail')}}">Contact</a></li>

                        @guest
                            @if (Route::has('login'))
                                <li class="header-get-a-quote">
                                    <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                  
                                <li class="header-get-a-quote">
                                    <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                              <li>
                                  <span class="alert alert-primary" role="alert">
                                      {{ Auth::user()->name }} <i class="fa fa-user"></i>
                                  </span>
                              </li>
                              <li class="header-get-a-quote">
                                    <a class="btn btn-primary" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </li>
                        @endguest
                      </ul>
                  </div>
                </nav>
            </div>
            <!--/ Col end -->
          </div>
          <!--/ Row end -->
      </div>
      <!--/ Container end -->
  
    </div>
    <!--/ Navigation end -->
</header>
  <!--/ Header end -->