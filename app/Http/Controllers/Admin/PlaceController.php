<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use App\Models\Contact;
use App\Models\Place;
use App\Models\Image;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        /*return view('admin.place.home', 
                ['places' => Place::all()
                ->sortByDesc('created_at')
                ->paginate(1)]);*/
        //$places = Place::all()->sortByDesc('created_at')->paginate(1);
        $places = Place::paginate(2);
        return view('admin.place.home', compact('places'));

        
    }

    public function create()
    {
        return view('admin.place.create');
    }

    public function store(Request $request)
    {
        //return $request->all();

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'town' => 'required',
            'district' => 'required',
            'avenue' => 'required',
            'number' => 'required',
            'phone' => 'required',
            'mail' => 'required',
            'web_site' => 'required',
        ]);

        //Create a new place
        $place = new Place;
        
        $place->name = $request->name;
        $place->description = $request->description;
        $place->like = 10;
        $place->save();

        //Create a new adress
        $adress = new Adress;
        $adress->town =  $request->town;
        $adress->district =  $request->district;
        $adress->avenue =  $request->avenue;
        $adress->number =  $request->number;
        $place->adress()->save($adress);

        //Create a new contact
        $contact = new Contact;
        $contact->phone =  $request->phone;
        $contact->mail =  $request->mail;
        $contact->web_site =  $request->web_site;
        $place->contacts()->save($contact);

        //Upload & rename images
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $file) {
                $imageName = time().rand(0,99).'.'.$file->extension(); 
                $file->move(public_path('images'), $imageName);
                $image = new Image;
                $image->link =  $imageName;
                $place->images()->save($image);
            }
        }

        return redirect('/admin/place')->with('success', 'Place created!');
        
    }

    public function show($id)
    {
        $place = Place::find($id)->with('adress', 'contacts', 'images')->firstOrFail();
        return $place;
        return view('admin.place.show', compact('place'));
    }

    public function edit($id)
    {
        $place = Place::find($id)->with('adress', 'contacts', 'images')->firstOrFail();
        return view('admin.place.edit', 
            [
                'place' => $place,
            ]);    
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'town' => 'required',
            'district' => 'required',
            'avenue' => 'required',
            'number' => 'required',
            'phone' => 'required',
            'mail' => 'required',
            'web_site' => 'required',
        ]);

        //Update place
        $place = Place::find($id);
        $place->name = $request->name;
        $place->description = $request->description;
        $place->save();

        //Update adress
        $adress = Adress::find($id);
        $adress->town =  $request->town;
        $adress->district =  $request->district;
        $adress->avenue =  $request->avenue;
        $adress->number =  $request->number;
        $adress->save();

        //Update contact
        $contact = Contact::find($id);
        $contact->phone =  $request->phone;
        $contact->mail =  $request->mail;
        $contact->web_site =  $request->web_site;
        $contact->save();

        //Upload & rename images
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $file) {
                $imageName = time().rand(0,99).'.'.$file->extension(); 
                $file->move(public_path('images'), $imageName);
                $image = new Image;
                $image->link =  $imageName;
                $place->images()->save($image);
            }
        }
    }


    public function destroy($id)
    {
        Place::where('id', $id)->delete();
        return redirect('/admin/place')->with('success', 'Place deleted!');
    }

}
