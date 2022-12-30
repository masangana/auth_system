<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        //$places = Place::all();
        $places = Place::with('adress', 'contacts', 'images', 'services', 'schedules')->paginate(6);
        //return $places;
        return view('user.place.index', [
            'places' => $places
        ]);
        
    }

    public function show(Place $place)
    {
        $place = Place::with('adress', 'contacts', 'images', 'services', 'schedules', 'comments')->where('id', $place->id)->firstOrFail();
        //return $place;
        return view('user.place.show', [
            'place' => $place
        ]);
    }
}
