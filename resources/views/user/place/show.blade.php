

@extends('user.app')

@section('pageTitle', 'Show')

@section('content')

<div id="banner-area" class="banner-area" style="background-image:url({{asset("images/".$place->images[0]->link)}}">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">{{$place->name}} </h1>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
</div>

<section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="sidebar sidebar-left">
              <div class="widget">
                <h3 class="widget-title">Categories</h3>
                <ul class="nav service-menu">
                    @if (count($place->categories) == 0)
                        <li>Pas de Categorie</li>
                    @else

                        @foreach ($place->categories as $category)
                            <li><a href="#">{{ $category->name }}</a></li>
                        @endforeach
                        
                    @endif
                </ul>
              </div>
              <div class="widget">
                <h3 class="widget-title">Contact</h3>
                <ul class="nav service-menu">
                    @if (count($place->categories) == 0)
                        <li>Pas de Categorie</li>
                    @else
                        <li><a href="mailto:{{ $place->contacts[0]->mail }} ">{{ $place->contacts[0]->mail }}</a></li>
                        <li><a href="tel:{{ $place->contacts[0]->phone }}">{{ $place->contacts[0]->phone }}</a></li>
                        <li><a href="{{ $place->contacts[0]->web_site }}" target="_blank">{{ $place->contacts[0]->web_site }}</a></li>
                    @endif
                </ul>
              </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-8">
          <div class="content-inner-page">
  
            <h2 class="column-title mrt-0"> {{$place->name}} </h2>

            <div class="row">
                <div class="col-md-12">
                  <p>{{$place->description}}.</p>
                </div><!-- col end -->
              </div>
  
            <div class="gap-20"></div>
  
            <div id="page-slider" class="page-slider">
                @if ( count($place->images) == 0)
                    <p>
                        No place
                    </p>
                @else
                    @foreach ($place->images as $image )
                        <div class="item">
                            <img loading="lazy" class="img-fluid" src="{{asset("images/".$image->link)}}" alt="{{$image->link}}" />
                        </div>
                    @endforeach
                @endif
              
            </div><!-- Page slider end -->
  
            <div class="gap-20"></div>
  
            <div class="row">
              <div class="col-md-6">
                <h3 class="column-title-small">Address</h3>
                @if (count($place->adress) == 0)
                    <p>
                        No Adress
                    </p>
                @else
                <ul class="list-arrow">
                    <li><strong>Pays : </strong> {{ $place->adress[0]->country }}</li>
                    <li><strong>Ville : </strong> {{ $place->adress[0]->city }}</li>
                    <li><strong>Commune : </strong> {{ $place->adress[0]->town }}</li>
                    <li><strong>Quartier : </strong> {{ $place->adress[0]->district }}</li>
                    <li><strong>Rue : </strong> {{ $place->adress[0]->avenue }}</li>
                    <li><strong>Numero : </strong> {{ $place->adress[0]->number }}</li>
                </ul>
                @endif
                <hr>
                
                <h3 class="column-title-small">Horaire</h3>
                <ul class="list-arrow">
                    @if (count($place->schedules) == 0)
                        <li>No Data</li>
                    @else

                        @foreach ($place->schedules as $schedule)
                            <li class="text-capitalize" >{{ $schedule->day }} : {{ $schedule->open->format("H:i") }} - {{ $schedule->close->format("H:i") }}</li>
                        @endforeach
                        
                    @endif
                </ul>
              </div>
  
              <div class="col-md-6 mt-5 mt-md-0">
                <h3 class="column-title-small">Services</h3>
  
                <div class="accordion accordion-group accordion-classic" id="construction-accordion">
                    @if (count($place->services) == 0)
                        <p>
                            No service
                        </p>
                    @else
                        @foreach ($place->services as $service )
                            <div class="card">
                                <div class="card-header p-0 bg-transparent" id="heading{{ $service->id }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $service->id }}" aria-expanded="false" aria-controls="collapse{{ $service->id }}">
                                        {{ $service->title }}
                                        </button>
                                    </h2>
                                </div>
          
                                <div id="collapse{{ $service->id }}" class="collapse show" aria-labelledby="heading{{ $service->id }}"
                                data-parent="#construction-accordion">
                                    <div class="card-body">
                                        <p>
                                            {{ $service->description }}
                                        </p>
                                        <ul class="list-arrow">
                                            <li>
                                                <strong>Max Prix : </strong>
                                                {{ $service->max_price }}
                                                <strong>Fc</strong>
                                            </li>
                                            <li>
                                                <strong>Min Prix : </strong>
                                                {{ $service->min_price }}
                                                <strong>Fc</strong>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    @endif
                  
                </div>
                <!--/ Accordion end -->
              </div>
            </div>
            <!--2nd row end -->
  
            <div class="gap-40"></div>
  
            <div class="call-to-action classic">
              <div class="row align-items-center">
                <div class="col-md-8 text-center text-md-left">
                  <div class="call-to-action-text">
                    <h3 class="action-title">Interested with this service.</h3>
                  </div>
                </div><!-- Col end -->
                <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                  <div class="call-to-action-btn">
                    <a class="btn btn-primary" href="#">Like it</a>
                  </div>
                </div><!-- col end -->
              </div><!-- row end -->
            </div><!-- Action end -->
  
          </div><!-- Content inner end -->
        </div><!-- Content Col end -->
  
  
      </div><!-- Main row end -->
    </div><!-- Conatiner end -->
</section>
    
@endsection