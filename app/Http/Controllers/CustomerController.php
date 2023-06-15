<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class CustomerController extends Controller
{
    //
    public function dashboard(){

        $previous_orders = Order::where('user_id', '=', auth()->user()->id)->with('products')->get();

        return view('customer.dashboard', [
            'previous_orders' => $previous_orders,
        ]);
    }
}