<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Place;

class GuestController extends Controller
{
    public function index()
    {
        $places = Place::paginate(6);
        $events = Event::paginate(6);

        return view('welcome',
            [
                'places' => $places,
                'events' => $events,
            ]);
    }
}
