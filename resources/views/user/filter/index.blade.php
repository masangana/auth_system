

@extends('user.app')

@section('pageTitle', 'Home')

@section('content')
    
    <livewire:filtre-services/>
    <hr>
    <livewire:show-services/>

@endsection