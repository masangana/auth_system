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
                    <a class="gallery-popup" href="images/projects/project1.jpg">
                      <img class="img-fluid" src="images/projects/project1.jpg" alt="project-image">
                      <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                    </a>
                    <div class="project-item-info">
                      <div class="project-item-info-content">
                        <h3 class="project-item-title">
                          <a href="projects-single.html">{{$event->title}}</a>
                        </h3>
                        <p class="project-cat">Commercial, Interiors</p>
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
            <a class="btn btn-primary" href="projects.html">View All Projects</a>
          </div>
        </div>
  
      </div><!-- Content row end -->
  
    </div><!-- Conatiner end -->
</section>
    
@endsection