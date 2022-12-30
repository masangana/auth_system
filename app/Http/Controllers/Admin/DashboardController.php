<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {

        $users = User::all();
        $places = Place::all();
        $events = Event::all();
        return view('admin.dashboard', 
        [
            'users' => $users,
            'places' => $places,
            'events' => $events
        ]);
    }
}
