<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            //put fields to be validated here
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'cost' => 'required',
            'image' => 'sometimes|mimes:jpg,png,jpeg|max:5048',
        ]);

        if(empty($request['image'])){
            Product::create([
                'title' => $request->input('title'),
                'category_id' => $request->input('category'),            
                'description' => $request->input('description'),
                'ingredients' => $request->input('ingredients'),
                'image' => null,
                'heat' => $request->input('heat'),
                'cost' => $request->input('cost'),
                'user_id' => auth()->user()->id
            ]);
    
            return redirect('/products')->with('message','Product Added');
            
        } else{
            //if image is uploaded, send the image name given to the $imageUploaded to the DB image_path attribute
            $imageUploaded = request()->file('image');
            $imageName = time(). '.' . $imageUploaded->getClientOriginalExtension();

            Product::create([
                'title' => $request->input('title'),
                'category_id' => $request->input('category'),            
                'description' => $request->input('description'),
                'ingredients' => $request->input('ingredients'),
                'heat' => $request->input('heat'),
                'cost' => $request->input('cost'),
                'image' => $imageName,
                'user_id' => auth()->user()->id
            ]);
        }

        dd($request);

        return redirect('/products')->with('message','Product added');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
