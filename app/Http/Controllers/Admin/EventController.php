<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use App\Models\Contact;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(10);
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        //return $request->all();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048|required',
            'town' => 'required',
            'district' => 'required',
            'avenue' => 'required',
            'number' => 'required',
            'phone' => 'required',
            'mail' => 'required',
            'web_site' => 'required',
        ]);

        //Create a new event
        $event = new Event;
        
        $event->title = $request->title;
        $event->description = $request->description;
        $event->finished = 0;
        $event->save();

        //Create a new adress
        $adress = new Adress;
        $adress->town =  $request->town;
        $adress->district =  $request->district;
        $adress->city =  $request->city;
        $adress->country =  $request->country;
        $adress->avenue =  $request->avenue;
        $adress->number =  $request->number;
        $event->adress()->save($adress);

        //Create a new contact
        $contact = new Contact;
        $contact->phone =  $request->phone;
        $contact->mail =  $request->mail;
        $contact->web_site =  $request->web_site;
        $event->contacts()->save($contact);

        //Create a new image
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $file) {
                $imageName = time().rand(0,99).'.'.$file->extension(); 
                $file->move(public_path('images'), $imageName);
                $image = new Image;
                $image->link =  $imageName;
                $event->images()->save($image);
            }
        }
    }

    public function show($id)
    {
        $event = Event::with('adress', 'contacts', 'images')->where('id', $id)->firstOrFail();
        //$types = Type::all();
        
        //return $event;
        return view('admin.event.show', compact('event'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Event::where('id', $id)->delete();
        return redirect('/admin/event')->with('success', 'Event deleted!');
    }

}
