@extends('user.app')

@section('pageTitle', 'Home')

@section('content')

<section id="main-container" class="main-container">
    <div class="container">
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
                        <img class="img-fluid" src=" {{asset("images/".$event->images[1]->link)}} " alt="{{$event->images[1]->link}}">
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
  
    </div><!-- Conatiner end -->
</section>
    
@endsection