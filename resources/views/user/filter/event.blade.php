

@extends('user.app')

@section('pageTitle', 'Search')

@section('content')


<section id="main-container" class="main-container">
    <div class="container">  
        <div class="row text-center">
            <div class="col-12">
              <h2 class="section-title">ReCherche</h2>
              <h3 class="section-sub-title">Find Our Location</h3>
            </div>
        </div>
        <livewire:filtre-events/>
    
        <livewire:show-events/>
    </div>
</div
        


@endsection