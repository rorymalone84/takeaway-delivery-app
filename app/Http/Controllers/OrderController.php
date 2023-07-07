<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Session;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{

    // order index for admin area
    public function index()
    {

        return view('orders.index', [
            'orders' => Order::all()
        ]);
    }

    //show/edit an individual order from admin area, with products
    public function show($id)
    {

        $order_products = Order::find($id)->products;

        return view('orders.show', [
            'order_products' => $order_products,
            'order' => Order::find($id)
        ]);
    }

    public function checkout()
    {

        return view('orders.checkout', [
            'user' => Auth::user(),
        ]);
    }

    public function store(OrderRequest $request, OrderService $orderService)
    {
        $total_price = $orderService->getTotal($request);

        $order = Order::create($request->all() + ['total_price' => $total_price, 'status' => 'pending']);

        foreach (session('cartProducts') as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);
        }

        Session::forget('cartProducts');
        Session::forget('order');
        Session::save();

        return Redirect::to(URL::temporarySignedRoute('storefront.confirmation', now()->addMinutes(5), [
            'id' => $order
        ]));
    }
}