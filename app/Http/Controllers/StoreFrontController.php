<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreFrontController extends Controller
{
    public function index(){
        return view('storefront.index', [
                'stores' => Store::all(),
        ]);
    }

    public function show_store(Store $store){

        return view('storefront.show', [
            'categories' => Category::with('products')->get(),
            'store' => $store
        ]);
    }

    public function show_product(Product $product){

        return view('storefront.showproduct', [
            'product' => $product,
        ]);
    }
}
