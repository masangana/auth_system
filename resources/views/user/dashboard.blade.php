

@extends('user.app')

@section('pageTitle', 'Home')

@section('content')

    <section id="main-container" class="main-container pb-2">
        <div class="container">
            <div class="row">
                @if ( count($places) == 0)
                    <p>
                        No place
                    </p>
                @else
                    @foreach ($places as $place )
                        <div class="col-lg-4 col-md-6 mb-5">
                            <div class="ts-service-box">
                                <div class="ts-service-image-wrapper">
                                <img loading="lazy" class="w-100" src="{{asset("images/".$place->images[1]->link)}}" alt="{{asset("images/".$place->images[1]->link)}}">
                                </div>
                                <div class="d-flex">
                                <div class="ts-service-box-img">
                                    <img loading="lazy" src="images/icon-image/service-icon1.png" alt="{{asset("images/".$place->images[1]->link)}}">
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
        
            </div><!-- Main row end -->
        </div><!-- Conatiner end -->
    </section>
          
@endsection