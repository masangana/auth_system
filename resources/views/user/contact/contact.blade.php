

@extends('user.app')

@section('pageTitle', 'Contact')

@section('content')
<div id="banner-area" class="banner-area" style="background-image:url({{asset('user/images/banner/banner1.jpg')}})">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Contact</h1>
                </div>
            </div><!-- Col end -->
          </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end --> 
  
<section id="main-container" class="main-container">
    <div class="container">
  
      <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Reaching our Office</h2>
          <h3 class="section-sub-title">Find Our Location</h3>
        </div>
      </div>
      <!--/ Title row end -->
  
      <div class="row">
        <div class="col-md-4">
            <div class="ts-service-box-bg text-center h-100">
              <span class="ts-service-icon icon-round">
                <i class="fa fa-phone-square mr-0"></i>
              </span>
              <div class="ts-service-box-content">
                <h4>Call Us</h4>
                <p>(+243) 810 241 127</p>
              </div>
            </div>
          </div><!-- Col 1 end -->
  
        <div class="col-md-4">
          <div class="ts-service-box-bg text-center h-100">
            <span class="ts-service-icon icon-round">
              <i class="fa fa-envelope mr-0"></i>
            </span>
            <div class="ts-service-box-content">
              <h4>Email Us</h4>
              <p>Alexmasangana@gmail.com</p>
            </div>
          </div>
        </div><!-- Col 2 end -->
  
        <div class="col-md-4">
          <div class="ts-service-box-bg text-center h-100">
            <span class="ts-service-icon icon-round">
              <i class="fa fa-phone-square mr-0"></i>
            </span>
            <div class="ts-service-box-content">
              <h4>Call Us</h4>
              <p>(+7) 999 805 00 76</p>
            </div>
          </div>
        </div><!-- Col 3 end -->
  
      </div><!-- 1st row end -->

      <div class="gap-40"></div>
  
      <div class="row">
        <div class="col-md-12">
          <h3 class="column-title">We love to hear</h3>
          <!-- contact form works with formspree.io  -->
          <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
          <form id="contact-form" action="https://formspree.io/f/xzbqpnll" method="post" role="form">
            @csrf
            <div class="error-container"></div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nom</label>
                  <input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email"
                    required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Téléphone</label>
                  <input type="tel" class="form-control form-control-subject" name="phone" id="phone" placeholder="" required>
                </div>
              </div>
            </div>

            <div class="form-group">
                <label>Sujet</label>
                <input class="form-control form-control-subject" name="subject" id="subject" placeholder="" required>
            </div>

            <div class="form-group">
              <label>Message</label>
              <textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10"
                required></textarea>
            </div>
            <div class="text-right"><br>
              <button class="btn btn-primary solid blank" type="submit">Send Message</button>
            </div>
          </form>
        </div>
  
      </div><!-- Content row -->
    </div><!-- Conatiner end -->
</section><!-- Main container end -->
  
@endsection