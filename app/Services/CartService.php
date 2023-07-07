<?php

namespace App\Services;


use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CartService
{
    public function updateTotalQuantity()
    {
        //get/update cart quantity
        $totalQuantity = 0;
        foreach (session('cartProducts') as $product) {
            $totalQuantity +=  $product['quantity'];
        }

        //sets cart quantity total for page refreshes
        session()->put('quantityTotal', $totalQuantity);

        return $totalQuantity;
    }
}