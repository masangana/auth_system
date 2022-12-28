<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        
        public function __construct() {
            $this->middleware('auth');
        }
        public function index() {

            $places = Place::with('adress', 'contacts', 'images', 'services', 'schedules')->paginate(1);
            return view('user.dashboard', [
                'places' => $places
            ]);
        }
}
