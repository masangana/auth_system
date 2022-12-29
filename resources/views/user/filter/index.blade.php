

@extends('user.app')

@section('pageTitle', 'Home')

@section('content')


<section id="main-container" class="main-container">
    <div class="container">  
        <div class="row text-center">
            <div class="col-12">
              <h2 class="section-title">ReCherche</h2>
              <h3 class="section-sub-title">Find Our Location</h3>
            </div>
        </div>
        <livewire:filtre-services/>
    
        <livewire:show-services/>
    </div>
</div
        


@endsection