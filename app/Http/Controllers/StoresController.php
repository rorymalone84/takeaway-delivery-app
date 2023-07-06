<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * This resource Controls the stores data from the admin section .
 */

class StoresController extends Controller
{

    public function index()
    {
        return view('stores.index', ['stores' => Store::all()]);
    }

    public function create()
    {
        $store = new Store();
        return view('stores.create', ['store' => $store]);
    }

    public function store(Request $request)
    {
        Store::create([
            'name' => $request->input('name'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'city' => $request->input('city'),
            'postcode' => $request->input('postcode'),
            'phone' => $request->input('phone'),
            'delivery_price' => $request->input('delivery_price'),
        ]);

        Session::flash('message', "The Store was Created");

        return view('stores.index', ['stores' => Store::all()]);
    }

    public function edit(Store $store)
    {
        return view('stores.edit', ['store' => $store]);
    }

    public function update(Request $request, Store $store)
    {
        Store::where('id', $store->id)
            ->update([
                'name' => $request->input('name'),
                'address_line_1' => $request->input('address_line_1'),
                'address_line_2' => $request->input('address_line_2'),
                'city' => $request->input('city'),
                'postcode' => $request->input('postcode'),
                'phone' => $request->input('phone'),
                'delivery_price' => $request->input('delivery_price'),
            ]);

        Session::flash('message', "The Store was updated");

        return view('stores.index', ['stores' => Store::all()]);
    }

    public function destroy(Store $store)
    {
        $store->delete();

        Session::now('message', "The Store was Deleted");

        return view('stores.index', ['stores' => Store::all()]);
    }
}
