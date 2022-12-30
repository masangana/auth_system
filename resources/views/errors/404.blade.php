

@extends('user.app')

@section('pageTitle', '404')

@section('content')

<div id="banner-area" class="banner-area" style="background-image:url({{asset('user/images/banner/banner4.jpg')}})">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">404</h1>
                  </nav>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
</div>
<section id="main-container" class="main-container">
    <div class="container">
  
      <div class="row">
  
        <div class="col-12">
          <div class="error-page text-center">
            <div class="error-code">
              <h2><strong>404</strong></h2>
            </div>
            <div class="error-message">
              <h3>Oops... Un Problème!</h3>
            </div>
            <div class="error-body">
                Essayez d'utiliser le bouton ci-dessous pour accéder à la page principale du site <br>
                @guest()
                    <a class="btn btn-primary" href="{{Route('index')}}">
                        Acceuil
                    </a>
                @else
                    <a class="btn btn-primary" href="{{Route('home')}}">
                        Acceuil
                    </a>
                @endguest
            </div>
          </div>
        </div>
  
      </div><!-- Content row -->
    </div><!-- Conatiner end -->
</section><!-- Main container end -->
  
  
@endsection