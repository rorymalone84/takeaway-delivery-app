<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class CustomerController extends Controller
{
    //
    public function dashboard()
    {
        //returns view with the customers previous orders retrieved
        return view('customer.dashboard', [
            'previous_orders' => Order::where('user_id', '=', auth()->user()->id)->with('products')->get(),
        ]);
    }
}