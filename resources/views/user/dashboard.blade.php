

@extends('user.app')

@section('pageTitle', 'Home')

@section('content')
        <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @if ( count($places) == 0)
                    <p>
                        No place
                    </p>
                @else
                    @foreach ($places as $place )
                        <div class="col-lg-4 col-md-6">
                            <div class="room-item">
                                <img src="img/room/room-1.jpg" alt="">
                                <div class="ri-text">
                                    <h4> {{$place->name}} </h4>
                                    <h3>{{$place->like}}<span> Likes</span></h3>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Size:</td>
                                                <td>30 ft</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>Max persion 3</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Bed:</td>
                                                <td>King Beds</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Services:</td>
                                                <td>Wifi, Television, Bathroom,...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ route('place.show', $place->id) }}" class="primary-btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </section>
        <!-- Rooms Section End -->

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
                                    <h3 class="service-box-title"><a href="{{ route('place.show', $place->id) }}">{{$place->name}}</a></h3>
                                    <p>{{ Str::limit($place->description, 25) }}</p>
                                    <a class="learn-more d-inline-block" href="{{ route('place.show', $place->id) }}" aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
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