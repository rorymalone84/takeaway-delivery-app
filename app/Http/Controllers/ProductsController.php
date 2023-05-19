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
        //The $product variable is just to pass an empty expected variable for the reusable products create/update form.
        $product = new Product();
        //the $categories collection is required to pass existing categories into the products form as a dropdown option.
        $categories = Category::all();
        return view('products.create', ['categories' => $categories, 'product' => $product]);
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
                'cost' => $request->input('cost'),
                'user_id' => auth()->user()->id
            ]);
    
            return redirect('/products')->with('message','Product Added');
            
        } else{
            //if image is uploaded, send the image name given to the $imageUploaded to the DB image_path attribute
            $image = time().'.'.$request->image->extension();    
            $request->image->move(public_path('images'), $image);

            Product::create([
                'title' => $request->input('title'),
                'category_id' => $request->input('category'),            
                'description' => $request->input('description'),
                'ingredients' => $request->input('ingredients'),
                'cost' => $request->input('cost'),
                'image' => $image,
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect('/products')->with('message','Product added');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validate = $this->validate(request(),[
            //put fields to be validated here
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'cost' => 'required',
            'image' => 'sometimes|mimes:jpg,png,jpeg|max:5048',
        ]);

        //if image upload isn't used, keep the previous image path
        if(empty($request['image'])){            
            Product::where('id',$product->id)
            ->update([
                'title' => $request->input('title'),
                'category_id' => $request->input('category'),            
                'description' => $request->input('description'),
                'ingredients' => $request->input('ingredients'),
                'cost' => $request->input('cost'),
                'user_id' => auth()->user()->id
            ]);     
        }
        else{
            //else' image is uploaded
            $image = time().'.'.$request->image->extension();     
            $request->image->move(public_path('images'), $image);

            Product::where('id',$product->id)
            ->update([
                'title' => $request->input('title'),
                'category_id' => $request->input('category'),            
                'description' => $request->input('description'),
                'ingredients' => $request->input('ingredients'),
                'image' => $image,
                'cost' => $request->input('cost'),
                'user_id' => auth()->user()->id
            ]); 
        }
        return redirect('/products')->with('message', 'Product updated!');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products')->with('message','Product deleted');
    }
}
