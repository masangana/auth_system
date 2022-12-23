<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::paginate(10);
        //return view('admin.service.home', compact('services')); 
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
       // return $request->all();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'maxPrice' => 'required',
            'minPrice' => 'required',
        ]);

        //Create a new service
        $service = new Service;
        $service->place_id = $request->place ;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->max_price = $request->maxPrice;
        $service->min_price = $request->minPrice;
        $service->save();

        return redirect()->route('place.show', ['place' => $request->place])->with('success', 'Service created successfully.');
    }

    public function show($id)
    {
        $service = Service::find($id);
        return view('admin.service.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'maxPrice' => 'required',
            'minPrice' => 'required',
        ]);

        $service = Service::find($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->max_price = $request->maxPrice;
        $service->min_price = $request->minPrice;
        $service->save();

        return redirect()->route('place.show', ['place' => $service->place_id])->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('place.show', ['place' => $service->place_id])->with('success', 'Service deleted successfully.');
    }
    
}
