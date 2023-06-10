<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function checkout(){
        return view('orders.checkout', ['user' => Auth::user()]);
    }

    //public function store(){
       //return view('orders.payment');
    //}

    public function store(Request $request){

        // Insert into orders table
        $order = Order::create([
            'user_id' => Auth::user() ? Auth::user()->id : null,
            'customer_name' => $request->input('customer_name'),
            'customer_address' => $request->input('customer_address'),
            'customer_email' => $request->input('customer_email'),
            'customer_city' => $request->input('customer_city'),
            'customer_phone' => $request->input('customer_phone'),
            'from_store' => Auth::user() ? $request->input('customer_name') : Session::get('nearestStore'),
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
