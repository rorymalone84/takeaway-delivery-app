<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;

class StoreFrontController extends Controller
{
    public function index()
    {
        return view('storefront.index', [
            'stores' => Store::all(),
        ]);
    }

    public function showstore($id)
    {
        $store = Store::findOrFail($id);
        Session::put('nearestStore', $store);

        return view('storefront.show', [
            'categories' => Category::with('products')->get(),
            'store' => $store,
        ]);
    }


    public function showproduct($id)
    {
        return view('storefront.showproduct', ['product' => Product::findOrFail($id)]);
    }


    public function confirmation($id)
    {
        return view('storefront.confirmation', [
            'order' => Order::findOrFail($id),
            'order_products' => Order::find($id)->products
        ]);
    }
}