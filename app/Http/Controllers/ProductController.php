<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Services\ProductService;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', ['products' => Product::orderBy('title')->filter(request(['search']))->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', ['categories' => Category::all(), 'product' => new Product()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, ProductService $productService)
    {
        if (empty($request['image'])) {
            $productService->storeWithoutImage($request);
        } else {
            $productService->storeWithImage($request);
        }

        Session::flash('message', "The product was added");

        return view('products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, ProductService $productService, $id)
    {
        if (empty($request['image'])) {
            $productService->updateWithoutImage($request, $id);
        } else {
            $productService->updateWithImage($request, $id);
        }

        Session::flash('message', "The product was Updated");

        return view('products.index', ['products' => Product::all()])->with('message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Session::flash('message', "The product was deleted");

        return redirect()->route('products.index', ['products' => Product::all()]);
    }
}
