<?php

namespace App\Http\Controllers;

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

    public function store(){
        return view('orders.confirmation');
    }
}
