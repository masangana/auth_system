

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
@endsection