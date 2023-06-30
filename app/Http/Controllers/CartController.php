<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart.cart');
    }


    public function addToCart($id)
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
                'description' => $product->description,
                'image' => $product->image,
                'ingredients' => $product->ingredients,
                'price' => $product->price,
                'category_id' => $product->category_id
            ];
        }

        //adds product to the cart
        session()->put('cartProducts', $cartProducts);

        //get/update cart quantity
        $totalQuantity = 0;
        foreach (session('cartProducts') as $product) {
            $totalQuantity +=  $product['quantity'];
        }

        //sets cart quantity total for page refreshes
        session()->put('quantityTotal', $totalQuantity);

        //returns respone to jquery on storefront.blade.
        return response()->json(['success' => true, 'totalQuantity' => $totalQuantity]);
    }


    public function deleteFromCart(Request $request)
    {
        if ($request->id) {
            $cartProducts = session()->get('cartProducts');

            if (isset($cartProducts[$request->id])) {
                unset($cartProducts[$request->id]);
                session()->put('cartProducts', $cartProducts);
            }

            //get/update cart quantity
            $totalQuantity = 0;
            foreach (session('cartProducts') as $product) {
                $totalQuantity +=  $product['quantity'];
            }

            //sets cart quantity total for page refreshes
            session()->put('quantityTotal', $totalQuantity);

            return response()->json(['success' => true, 'totalQuantity' => $totalQuantity]);
        }
    }


    public function updateCart(Request $request)
    {

        if ($request->id && $request->quantity) {
            $cartProducts = session()->get('cartProducts');
            $cartProducts[$request->id]["quantity"] = $request->quantity;
            session()->put('cartProducts', $cartProducts);
        }

        //get/update cart quantity
        $totalQuantity = 0;
        foreach (session('cartProducts') as $product) {
            $totalQuantity +=  $product['quantity'];
        }

        //sets cart quantity total for page refreshes
        session()->put('quantityTotal', $totalQuantity);

        return response()->json(['success' => true, 'totalQuantity' => $totalQuantity]);
    }


    public function reorder($id)
    {
        $order_products = Order::where('id', $id)->with('products')->get();

        foreach ($order_products as $order_product) {
            foreach ($order_product->products as $product) {
                if (isset($cartProducts['quantity'])) {
                    $cartProducts['quantity']++;
                } else {
                    $cartProducts[] = [
                        'id' => $product->id,
                        'quantity' => $product->pivot->quantity,
                        'title' => $product->title,
                        'description' => $product->description,
                        'image' => $product->image,
                        'ingredients' => $product->ingredients,
                        'price' => $product->price,
                        'category_id' => $product->category_id
                    ];
                }
            }
        }

        //unset($cartProducts[0]);
        session()->put('cartProducts', $cartProducts);

        Session::flash('message', "Re-order in the cart");

        return redirect()->back();
    }
}
