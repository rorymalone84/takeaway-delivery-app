<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stores.index', ['stores' => Store::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $store = new Store();
        return view('stores.create', ['store' => $store]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Store::create([
            'name' => $request->input('name'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'city' => $request->input('city'),
            'postcode' => $request->input('postcode'),
            'phone' => $request->input('phone'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude')            
        ]);

        return redirect('/stores')->with('message', 'New Store created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('stores.edit', ['store' => $store]);
    }

    /**
     * Update the specified resource in storage.
     */
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
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude')
        ]);

        return redirect('/stores')->with('message', 'Store updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();

        return redirect('/stores')->with('message','Store deleted');
    }
}
