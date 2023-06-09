<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Session;

class StoreFrontController extends Controller
{
    public function index(){
        
        return view('storefront.index', [
                'stores' => Store::all(),
        ]);
    }

    public function showstore($id){

        $store = Store::findOrFail($id);
        Session::put('nearestStore', $store->name);
        Session::put('delivery_price', $store->delivery_price);
        return view('storefront.show', [
            'categories' => Category::with('products')->get(),
            'store' => $store,          
        ]);
    }

    public function showproduct($id){

        return view('storefront.showproduct', ['product' => Product::findOrFail($id)]);
    }
}
