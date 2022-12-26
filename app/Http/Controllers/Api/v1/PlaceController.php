<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    
    public function getPlaces()
    {
        $places = Place::all();
        return response()->json($places);
    }

    public function getPlace($id)
    {
        $place = Place::find($id);
        return response()->json($place);
    }

    public function getPlaceAdress($id)
    {
        $place = Place::find($id);
        $adress = $place->adress;
        return response()->json($adress);
    }

    public function getPlaceContact($id)
    {
        $place = Place::find($id);
        $contact = $place->contacts;
        return response()->json($contact);
    }

    public function getPlaceImages($id)
    {
        $place = Place::find($id);
        $images = $place->images;
        return response()->json($images);
    }

    public function getPlaceComments($id)
    {
        $place = Place::find($id);
        $comments = $place->comments;
        return response()->json($comments);
    }
}
