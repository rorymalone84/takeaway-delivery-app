<?php

namespace App\Services;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreProductRequest;

class StoreService
{
    public function createStore(Request $request)
    {
        $store = Store::create([
            'name' => $request->input('name'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'city' => $request->input('city'),
            'postcode' => $request->input('postcode'),
            'phone' => $request->input('phone'),
            'delivery_price' => $request->input('delivery_price'),
        ]);

        return $store;
    }

    public function updateStore(Request $request, Store $store)
    {
        $store = Store::where('id', $store->id)
            ->update([
                'name' => $request->input('name'),
                'address_line_1' => $request->input('address_line_1'),
                'address_line_2' => $request->input('address_line_2'),
                'city' => $request->input('city'),
                'postcode' => $request->input('postcode'),
                'phone' => $request->input('phone'),
                'delivery_price' => $request->input('delivery_price'),
            ]);

        return $store;
    }
}
