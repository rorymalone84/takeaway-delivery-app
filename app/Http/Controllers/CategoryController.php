<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create', ['category' => new Category()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'title' => $request->input('title'),
            'user_id' => auth()->user()->id
        ]);

        Session::flash('message', "The Category was Created");

        return view('categories.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        Category::where('id', $category->id)
            ->update([
                'title' => $request->input('title'),
                'user_id' => auth()->user()->id
            ]);

        Session::flash('message', "The Category was updated");

        return view('categories.index', ['categories' => Category::all()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Session::flash('message', "The Category was deleted");

        return view('categories.index', ['categories' => Category::all()]);
    }
}