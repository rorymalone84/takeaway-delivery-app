<?php

namespace App\Http\Controllers;

use App\Models\Store;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\StoreService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\nearestStoreRequest;
use JustSteveKing\LaravelPostcodes\Facades\Postcode;

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
        return view('stores.create', ['store' => new Store()]);
    }


    public function store(StoreService $storeService, CreateStoreRequest $createStoreRequest)
    {
        $storeService->createStore($createStoreRequest);

        Session::flash('message', "The Store was Created");

        return view('stores.index', ['stores' => Store::all()]);
    }


    public function edit(Store $store)
    {
        return view('stores.edit', ['store' => $store]);
    }


    public function update(StoreService $storeService, CreateStoreRequest $createStoreRequest, Store $store)
    {
        $storeService->updateStore($createStoreRequest, $store);

        Session::flash('message', "The Store was updated");

        return view('stores.index', ['stores' => Store::all()]);
    }


    public function destroy(Store $store)
    {
        $store->delete();

        Session::now('message', "The Store was Deleted");

        return view('stores.index', ['stores' => Store::all()]);
    }

    //finds the 5 nearest stores and displays the distance from the submitted postcode
    public function findNearest(NearestStoreRequest $request, StoreService $storeService)
    {
        //get and validate user postcode
        $postcode = $request['search'];
        //get co-ordinates from users postcode
        $postcodeData = Postcode::getPostcode($postcode);
        // - longitude
        $longitude = $postcodeData->longitude;
        // - latitude
        $latitude = $postcodeData->latitude;
        // radius distance in miles
        $radius = 10;

        return view('storefront.index', [
            'stores' => $storeService->findByDistance($latitude, $longitude, $radius),
        ]);
    }
}
