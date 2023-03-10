<?php

namespace App\Http\Controllers;

use App\Models\Place;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $places = Place::with('adress', 'contacts', 'images', 'services', 'schedules')->paginate(6);

        return view('user.dashboard', [
            'places' => $places,
        ]);
    }
}
