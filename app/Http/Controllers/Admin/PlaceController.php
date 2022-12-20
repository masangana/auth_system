<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
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
        return $request->all();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $place = new Place([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);
        $place->save();
        return redirect('/admin/place')->with('success', 'Place saved!');
    }
}
