<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('adress', 'contacts', 'images', 'schedules')->paginate(6);
        return $events;
        return view('user.event.index',
            [
                'events' => $events
            ]);
    }

    public function show(Event $event)
    {
        $event = Event::with('adress', 'contacts', 'images', 'services', 'schedules')->where('id', $event->id)->firstOrFail();
        return view('user.event.show', [
            'event' => $event
        ]);
    }
}
