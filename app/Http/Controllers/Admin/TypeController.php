<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::paginate(10);
        return view('admin.type.home', [
            'types' => $types
        ]
        );
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $type = new Type;
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();

        return redirect()->route('type.index');
    }

    public function show($id)
    {
        //
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
        Type::where('id', $id)->delete();
        return redirect()->route('type.index');

    }
}
