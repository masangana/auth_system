<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.category.index', [
            'categories' => $categories,
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

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('category.index');
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
        Category::where('id', $id)->delete();

        return redirect()->route('category.index');
    }
}
