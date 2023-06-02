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

    public function showstore(Store $store){

        return view('storefront.show', [
            'categories' => Category::with('products')->get(),
            'store' => $store
        ]);
    }

    public function showproduct($id){

        return view('storefront.showproduct', ['product' => Product::findOrFail($id)]);
    }
}
