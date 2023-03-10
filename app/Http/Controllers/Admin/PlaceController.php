<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Place;
use App\Models\Type;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::paginate(10);

        return view('admin.place.home', compact('places'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.place.create', [
            'categories' => $categories,
        ]);
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
        $adress->town = $request->town;
        $adress->district = $request->district;
        $adress->city = $request->city;
        $adress->country = $request->country;
        $adress->avenue = $request->avenue;
        $adress->number = $request->number;
        $place->adress()->save($adress);

        //Create a new contact
        $contact = new Contact;
        $contact->phone = $request->phone;
        $contact->mail = $request->mail;
        $contact->web_site = $request->web_site;
        $place->contacts()->save($contact);

        //Upload & rename images
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $file) {
                $imageName = time().rand(0, 99).'.'.$file->extension();
                $file->move(public_path('images'), $imageName);
                $image = new Image;
                $image->link = $imageName;
                $place->images()->save($image);
            }
        }

        //Attach with categories
        $place->categories()->attach($request->categories);

        return redirect('/admin/place')->with('success', 'Place created!');
    }

    public function show($id)
    {
        $place = Place::with('adress', 'contacts', 'images', 'services', 'schedules', 'comments')->where('id', $id)->firstOrFail();
        $types = Type::all();

        //return $place;
        return view('admin.place.show', compact('place', 'types'));
    }

    public function edit($id)
    {
        $place = Place::with('adress', 'contacts', 'images', 'categories')->where('id', $id)->firstOrFail();

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
        $adress->town = $request->town;
        $adress->district = $request->district;
        $adress->city = $request->city;
        $adress->country = $request->country;
        $adress->avenue = $request->avenue;
        $adress->number = $request->number;
        $adress->save();

        //Update contact
        $contact = Contact::find($id);
        $contact->phone = $request->phone;
        $contact->mail = $request->mail;
        $contact->web_site = $request->web_site;
        $contact->save();

        //Attache with categories
        $place->categories()->attach($request->categories);

        //Upload & rename images
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $file) {
                $imageName = time().rand(0, 99).'.'.$file->extension();
                $file->move(public_path('images'), $imageName);
                $image = new Image;
                $image->link = $imageName;
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
