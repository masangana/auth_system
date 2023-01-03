

@extends('user.app')

@section('pageTitle', 'Guest')

@section('content')

<!--/ Premium for ads -->

<div class="banner-carousel banner-carousel-2 mb-0">
    <div class="banner-carousel-item" style="background-image:url({{asset('user/images/slide1.jpg')}})">
      <div class="container">
          <div class="box-slider-content">
            <div class="box-slider-text">
                <h2 class="box-slide-title">Les Bons coins</h2>
                <h3 class="box-slide-sub-title">Une visibilité gratuite</h3>
                <p class="box-slide-description">Vous posseder un établissement ou sipmlement souhaitez partager vos secret laissez nous un message.</p>
                <p>
                  <a href="{{ route('contact.mail') }}" class="slider btn btn-primary">Contact</a>
                </p>
            </div>
          </div>
      </div>
    </div>
  
    <div class="banner-carousel-item" style="background-image:url({{asset('user/images/slide2.jpg')}})">
      <div class="slider-content text-left">
          <div class="container">
            <div class="box-slider-content">
                <div class="box-slider-text">
                  <h2 class="box-slide-title">Agenda</h2>
                  <h3 class="box-slide-sub-title">Un evenement de qualité</h3>
                  <p class="box-slide-description">Concert, Conference, Webinar ou autre, Donnez une visibilité à votre evenement et marquez les esprits.</p>
                  <p><a href="{{ route('contact.mail') }}" class="slider btn btn-primary" aria-label="about-us">Contact</a></p>
                </div>
            </div>
          </div>
      </div>
    </div>
</div>

<!--/ End Premium for ads -->

<section class="call-to-action no-padding">
    <div class="container">
      <div class="action-style-box">
          <div class="row">
            <div class="col-md-8 text-center text-md-left">
                <div class="call-to-action-text">
                  <h3 class="action-title">Inscrivez-vous pour avoir accez à plus de fonctionalité</h3>
                </div>
            </div><!-- Col end -->
            <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                <div class="call-to-action-btn">
                  <a class="btn btn-primary" href="{{ route('register') }}">Inscription</a>
                </div>
            </div><!-- col end -->
          </div><!-- row end -->
      </div><!-- Action style box -->
    </div><!-- Container end -->
</section><!-- Action end -->


<!-- Place -->

<section id="main-container" class="main-container pb-2">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
              <h3 class="section-sub-title">Les Meilleurs Coins</h3>
            </div>
          </div>
        <div class="row">
            <div class="col-12">
                <div class="row shuffle">
                    @if ( count($places) == 0)
                        <p>
                            No place
                        </p>
                    @else
                        @foreach ($places as $place )
                            <div class="col-lg-4 col-md-6 mb-5">
                                <div class="ts-service-box">
                                    <div class="ts-service-image-wrapper">
                                    <img loading="lazy" class="w-100" src="{{asset("images/".$place->images[0]->link)}}" alt="{{$place->images[0]->link}}">
                                    </div>
                                    <div class="d-flex">
                                    <div class="ts-service-box-img">
                                        <img loading="lazy" src="{{asset('user/images/icon-image/service-icon1.png')}}" alt="{{asset("images/".$place->images[0]->link)}}">
                                    </div>
                                    <div class="ts-service-info">
                                        <h3 class="service-box-title"><a href="{{ route('places.show', $place->id) }}">{{$place->name}}</a></h3>
                                        <p>{{ Str::limit($place->description, 25) }}</p>
                                        <a class="learn-more d-inline-block" href="{{ route('places.show', $place->id) }}" aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
                                    </div>
                                    </div>
                                </div><!-- Service2 end -->
                            </div>
                        @endforeach
                    @endif
                </div><!-- shuffle end -->
            </div>

            <div class="col-12">
                <div class="general-btn text-center">
                    <p>{{ $places->links() }}</p>
                </div>
            </div>
            
        </div><!-- Main row end -->
    </div><!-- Conatiner end -->
</section>
  
<!--/ End Place -->

<section class="subscribe no-padding">
    <div class="container">
      <div class="row">
          <div class="col-lg-4">
            <div class="subscribe-call-to-acton">
                <h3>Besoin de visibilité?</h3>
                <h4>(+7) 999-805-0076</h4>
            </div>
          </div><!-- Col end -->
  
          <div class="col-lg-8">
            <div class="ts-newsletter row align-items-center">
                <div class="col-md-7 newsletter-introtext">
                  <h4 class="text-white mb-0">Laissez-nous un message</h4>
                  <p class="text-white">Et faites vous connaitre gratuitement</p>
                </div>
  
                <div class="col-md-5 newsletter-form">
                    <div class="call-to-action-btn">
                        <a class="btn btn-primary" href="{{ route('contact.mail') }}">contact</a>
                    </div>
                </div>
            </div><!-- Newsletter end -->
          </div><!-- Col end -->
  
      </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
  </section>

<!-- Event -->

<section id="project-area" class="project-area solid-bg">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12">
          <h2 class="section-title">Work of Excellence</h2>
          <h3 class="section-sub-title">Recent Projects</h3>
        </div>
      </div>
      <!--/ Title row end -->
  
      <div class="row">
        <div class="col-12">
          <div class="row shuffle-wrapper">
            <div class="col-1 shuffle-sizer"></div>

            @if (count($events) == 0)
              
            @else
              @foreach ($events as $event)
              
                <div class="col-lg-4 col-md-6 shuffle-item">
                  <div class="project-img-container">
                    <a  href="{{ route('events.show', $event->id) }}">
                      @if (count($event->categories) == 0)
                        <img class="img-fluid" src="images/projects/project1.jpg" alt="project-image">
                      @else
                        <img class="img-fluid" src=" {{asset("images/".$event->images[0]->link)}} " alt="{{$event->images[0]->link}}">
                      @endif
                      <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                    </a>
                    <div class="project-item-info">
                      <div class="project-item-info-content">
                        <h3 class="project-item-title">
                          <a href="{{ route('events.show', $event->id) }}">{{$event->title}}</a>
                        </h3>
                        @if (count($event->categories) == 0)
                          
                        @else
                          @foreach ($event->categories as $category)
                          <p class="project-cat">{{$category->name}}</p>
                          @endforeach
                        @endif
                        
                      </div>
                    </div>                
                  </div>
                </div>
              @endforeach
            @endif

            <!-- shuffle item 1 end -->

          </div><!-- shuffle end -->
        </div>
  
        <div class="col-12">
          <div class="general-btn text-center">
            {{ $events->links() }}
          </div>
        </div>
  
      </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
</section>

<!--/ End Event -->


@endsection