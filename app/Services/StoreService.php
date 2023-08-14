<?php

namespace App\Services;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreProductRequest;
use JustSteveKing\LaravelPostcodes\Facades\Postcode;



class StoreService
{
    public function createStore(Request $request)
    {
        //get and validate user postcode
        $postcode = $request->input('postcode');
        //get co-ordinates from users postcode
        $postcodeData = Postcode::getPostcode($postcode);
        // - longitude
        $longitude = $postcodeData->longitude;
        // - latitude
        $latitude = $postcodeData->latitude;

        $store = Store::create([
            'name' => $request->input('name'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'city' => $request->input('city'),
            'postcode' => $postcode,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'phone' => $request->input('phone'),
            'delivery_price' => $request->input('delivery_price'),
        ]);

        return $store;
    }

    public function updateStore(Request $request, Store $store)
    {
        //get and validate user postcode
        $postcode = $request->input('postcode');
        //get co-ordinates from users postcode
        $postcodeData = Postcode::getPostcode($postcode);
        // - longitude
        $longitude = $postcodeData->longitude;
        // - latitude
        $latitude = $postcodeData->latitude;

        $store = Store::where('id', $store->id)
            ->update([
                'name' => $request->input('name'),
                'address_line_1' => $request->input('address_line_1'),
                'address_line_2' => $request->input('address_line_2'),
                'city' => $request->input('city'),
                'postcode' => $postcode,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'phone' => $request->input('phone'),
                'delivery_price' => $request->input('delivery_price'),
            ]);

        return $store;
    }

    public function findByDistance($latitude, $longitude, $radius)
    {
        $nearestStores = Store::selectRaw("id, name, latitude,postcode,phone, longitude,
                     ( 3959 * acos( cos( radians(?) ) *
                       cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
                       ) + sin( radians(?) ) *
                       sin( radians( latitude ) ) )
                     ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance", 'asc')
            ->offset(0)
            ->limit(5)
            ->get();

        return $nearestStores;
    }
}
