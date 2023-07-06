<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreProductRequest;

class ProductService
{
    //if the post request does not contain an image file
    public function storeWithoutImage(Request $request)
    {
        $product = Product::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
            'ingredients' => $request->input('ingredients'),
            'image' => null,
            'price' => $request->input('price'),
            'user_id' => auth()->user()->id
        ]);

        return $product;
    }

    //if the post request contains an image file
    public function storeWithImage(Request $request)
    {
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $image);

        $product = Product::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
            'ingredients' => $request->input('ingredients'),
            'price' => $request->input('price'),
            'image' => $image,
            'user_id' => auth()->user()->id
        ]);

        return $product;
    }

    public function updateWithoutImage(Request $request, $id)
    {
        $product = Product::find($id)->update([
            'title' => $request->input('title'),
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
            'ingredients' => $request->input('ingredients'),
            'image' => null,
            'price' => $request->input('price'),
            'user_id' => auth()->user()->id
        ]);

        return $product;
    }

    //update with image
    public function updateWithImage(Request $request, $id)
    {
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $image);

        $product = Product::find($id)->update([
            'title' => $request->input('title'),
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
            'ingredients' => $request->input('ingredients'),
            'price' => $request->input('price'),
            'image' => $image,
            'user_id' => auth()->user()->id
        ]);

        return $product;
    }
}
