<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function cart(){
        return view('cart.cart');
    }

    public function addToCart($id){
        $product = Product::findOrFail($id);
        $cartProducts = session()->get('cartProducts', []);

        if(isset($cartProducts[$id])){
            $cartProducts[$id]['quantity']++;
        }
        else{
            $cartProducts[$id] = [
                'quantity' => 1,
                'name' => $product->name,
                'description' => $product->description,
                'image' => $product->image,
                'ingredients' => $product->ingredients,
                'cost' => $product->cost,
                'category_id' => $product->category_id
            ];          
        }

        session()->put('cartProducts',$cartProducts);
        return redirect()->back()->with('message', 'product added');
    }

    public function deleteFromCart(Request $request){
        if($request->id){
            $cartProducts = session()->get('cartProducts');

            if(isset($cartProducts[$request->id])){
                unset($cartProducts[$request->id]);
                session()->put('cartProducts', $cartProducts);
            }

            return redirect()->back()->with('message', 'product deleted');
        }
    }

    public function updateCart(Request $request){

        if($request->id && $request->quantity){
            $cartProducts = session()->get('cartProducts');
            $cartProducts[$request->id]["quantity"] = $request->quantity;
            session()->put('cartProducts', $cartProducts);
        }
        return redirect()->back()->with('success', 'Cart Updated!');
    }
    
}
