<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('img');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        return back()->with('success', 'You have successfully upload image.')->with('path', $new_name);
    }

    public function destroy($id)
    {
        $image = Image::where('id', $id)->delete();
        //$image->delete();
        return back()->with('success', 'You have successfully delete image.');
    }
}
