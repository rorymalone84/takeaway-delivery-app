<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreRequest;
use App\Services\StoreService;
use App\Models\Store;
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
}
