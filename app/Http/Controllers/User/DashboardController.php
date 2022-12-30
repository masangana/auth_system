<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Place;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $places = Place::with('adress', 'contacts', 'images', 'services', 'schedules')->paginate(6);

        return view('user.dashboard', [
            'places' => $places,
        ]);
    }
}
