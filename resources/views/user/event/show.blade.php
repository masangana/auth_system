@extends('user.app')

@section('pageTitle', 'Home')

@section('content')

<div id="banner-area" class="banner-area" style="background-image:url({{asset("images/".$event->images[0]->link)}}">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">{{$event->title}} </h1>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
</div>


<section id="main-container" class="main-container">
    <div class="container">
  
      <div class="row">
        <div class="col-lg-8">
          <div id="page-slider" class="page-slider small-bg">
                @if ( count($event->images) == 0)
                    <div class="item">
                        <img loading="lazy" class="img-fluid" src="images/projects/project5.jpg" alt="project-image" />
                    </div>
                @else
                    @foreach ($event->images as $image )
                        <div class="item">
                            <img loading="lazy" class="img-fluid" src="{{asset("images/".$image->link)}}" alt="{{$image->link}}" />
                        </div>
                    @endforeach
                @endif
          </div><!-- Page slider end -->
          <div class="gap-20"></div>
          <div class="row">
            <div class="col-md-12">
              <div class="project-info">
                <p>{{$event->description}}</p>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6">
                <div class="project-info">
                    <h4 >Contact</h4>
                    <ul class="list-arrow">
                        <li><strong>Phone :</strong> <a href="tel:{{ $event->contacts[0]->phone }}">{{$event->contacts[0]->phone}}</a></li>
                        <li><strong>Email :</strong> <a href="mailto:{{ $event->contacts[0]->mail }}">{{$event->contacts[0]->mail}}</a></li>
                        <li><strong>Website :</strong> <a href="{{ $event->contacts[0]->web_site }}" target="blank">{{$event->contacts[0]->web_site}}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="project-info">
                    <h4 >Adresse</h4>
                    <ul class="list-arrow">
                        <li><strong>Pays : </strong> {{ $event->adress[0]->country }}</li>
                        <li><strong>Ville : </strong> {{ $event->adress[0]->city }}</li>
                        <li><strong>Commune : </strong> {{ $event->adress[0]->town }}</li>
                        <li><strong>Quartier : </strong> {{ $event->adress[0]->district }}</li>
                        <li><strong>Rue : </strong> {{ $event->adress[0]->avenue }}</li>
                        <li><strong>Numero : </strong> {{ $event->adress[0]->number }}</li>
                    </ul>
                </div>
            </div>
   
          </div>
        </div><!-- Slider col end -->
  
        <div class="col-lg-4 mt-5 mt-lg-0">
  
          <h3 class="column-title mrt-0">{{$event->title}}</h3>
            <hr>
          <ul class="project-info list-unstyled">
            <li>
              <h4 class="project-info-label">Calendrier</h4>
              <p class="project-info-content">
                <ul class="list-arrow">
                    @if (count($event->schedules) == 0)                   
                        <p class="project-info-content">Le programme sera bientot disponible</p>                      
                    @else
                        @foreach ($event->schedules as $schedule )
                            @if ($schedule->title == NULL)

                            @else
                                <p class="project-info-label">{{ $schedule->title }}</p>
                                <p class="project-info-content">{{ $schedule->description }}</p>
                            @endif
                            <li><strong>Date de Debut : </strong> {{ $schedule->date_start->format("d:m:Y") }}</li>
                            <li><strong>Date de Fin : </strong> {{ $schedule->date_end->format("d:m:Y") }}</li>
                            <li><strong>Heure de Debut : </strong> {{ $schedule->time_start->format("H:i") }}</li>
                            <li><strong>Heure de Fin : </strong> {{ $schedule->time_end->format("H:i") }}</li>
                        @endforeach
                        
                    @endif

                </ul>
              </p>
            </li>
          </ul>
  
        </div><!-- Content col end -->
  
      </div><!-- Row end -->
  
    </div><!-- Conatiner end -->
  </section><!-- Main container end -->
  

@endsection