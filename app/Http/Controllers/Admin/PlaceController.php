<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        return view('admin.place.home');
    }

    public function create()
    {
        return view('admin.place.create');
    }

    public function store(Request $request)
    {
        //
    }
}
