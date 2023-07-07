<?php

namespace App\Services;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderService
{

    public function getTotal(Request $request)
    {
        $total_price = 0;

        foreach (session('cartProducts') as $product) {
            $total_price += $product['price'] * $product['quantity'];
        }

        $total_price += $request->input('delivery_price');

        return $total_price;
    }
}