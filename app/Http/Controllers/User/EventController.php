<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('adress', 'contacts', 'images', 'schedules', 'categories')->paginate(6);
        //return $events ;
        return view('user.event.index',
            [
                'events' => $events,
            ]);
    }

    public function show(Event $event)
    {
        $event = Event::with('adress', 'contacts', 'images', 'schedules')->where('id', $event->id)->firstOrFail();

        return view('user.event.show', [
            'event' => $event,
        ]);
    }
}
