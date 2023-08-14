<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Order;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart.cart');
    }


    public function addToCart($id, CartService $cartService)
    {
        $product = Product::findOrFail($id);
        $cartProducts = session()->get('cartProducts', []);

        if (isset($cartProducts[$id])) {
            $cartProducts[$id]['quantity']++;
        } else {
            $cartProducts[$id] = [
                'id' => $product->id,
                'quantity' => 1,
                'title' => $product->title,
                'price' => $product->price,
            ];
        }
        //adds product to the cart
        session()->put('cartProducts', $cartProducts);
        //get/update cart quantity
        $totalQuantity = $cartService->updateTotalQuantity();
        //returns response to jquery on storefront.blade.
        return response()->json(['success' => true, 'totalQuantity' => $totalQuantity]);
    }


    public function deleteFromCart(Request $request, CartService $cartService)
    {
        if ($request->id) {
            $cartProducts = session()->get('cartProducts');

            if (isset($cartProducts[$request->id])) {
                unset($cartProducts[$request->id]);
                session()->put('cartProducts', $cartProducts);
            }

            $totalQuantity = $cartService->updateTotalQuantity();

            return response()->json(['success' => true, 'totalQuantity' => $totalQuantity]);
        }
    }


    public function updateCart(Request $request, CartService $cartService)
    {
        if ($request->id && $request->quantity) {
            $cartProducts = session()->get('cartProducts');
            $cartProducts[$request->id]["quantity"] = $request->quantity;
            session()->put('cartProducts', $cartProducts);
        }

        $totalQuantity = $cartService->updateTotalQuantity();

        return response()->json(['success' => true, 'totalQuantity' => $totalQuantity]);
    }


    public function reorder($id, CartService $cartService)
    {
        $order_products = Order::where('id', $id)->with('products')->get();
        $cartProducts = session()->get('cartProducts', []);

        foreach ($order_products as $order_product) {
            foreach ($order_product->products as $product) {
                if (isset($cartProducts['quantity'])) {
                    $cartProducts['quantity']++;
                } else {
                    $cartProducts[$product->id] = [
                        'id' => $product->id,
                        'quantity' => $product->pivot->quantity,
                        'title' => $product->title,
                        'price' => $product->price,
                    ];
                }
            }
        }

        session()->put('cartProducts', $cartProducts);

        $totalQuantity = $cartService->updateTotalQuantity();

        Session::flash('message', "Re-order in the cart");

        return redirect()->back()->with($totalQuantity);
    }
}