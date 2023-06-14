<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    // order index for admin area
    public function index(){

        return view('orders.index', [
            'orders' => Order::all()
        ]);
    }

    //show/edit an individual order from admin area, with products
    public function show($id){

        $order_products = Order::find($id)->products;

        return view('orders.show', [
            'order_products' => $order_products,
            'order' => Order::find($id)
        ]);
    }

    public function checkout(){

        return view('orders.checkout', [
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request){

        $total_price = 0;

        foreach (session('cartProducts') as $product){
            $total_price += $product['price'] * $product['quantity'];
        }

        $total_price += $request->input('delivery_price');

        // Insert into orders table
        $order = Order::create([
            'user_id' => Auth::user()->id ?? null,
            'customer_name' => $request->input('customer_name'),
            'customer_address' => $request->input('customer_address'),
            'customer_email' => $request->input('customer_email'),
            'customer_city' => $request->input('customer_city'),
            'customer_phone' => $request->input('customer_phone'),
            'delivery_price' => $request->input('delivery_price'),
            'total_price' => $total_price,
            'store_id' => $request->input('store_id'),
            'status' => 'pending'
        ]);

        foreach (session('cartProducts') as $product){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);
        }

        Session::forget('cartProducts');
        Session::save();

        return view('/', $order);
    }
}