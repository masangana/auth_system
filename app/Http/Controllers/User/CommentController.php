<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Place;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        //return $request->all();
        $request->validate([
            'comment' => 'required',
            'place' => 'required',
            'user' => 'required',
        ]);

        

        $comment = new Comment();
        $place = Place::find($request->place);
        
        $comment->content = $request->comment;
        //$comment->place_id = $request->place;
        $comment->user_id = $request->user;
        //$comment->save();
        $place->comments()->save($comment);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back();
    }
}
