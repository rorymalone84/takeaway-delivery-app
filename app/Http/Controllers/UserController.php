<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use JustSteveKing\LaravelPostcodes\Rules\Postcode;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', ['users' => User::orderBy('name')->filter(request(['search']))->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new user();
        $stores = Store::all();
        return view('users.create', [
            'user' => $user,
            'stores' => $stores
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $stores = Store::all();
        return view('users.edit', [
            'user' => $user,
            'stores' => $stores,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, User $user)
    {
        User::where('id', $user->id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'postcode' => $request->input('postcode'),
                'phone' => $request->input('phone'),
                'store_id' => $request->input('store_id')
            ]);

        return redirect('/admin/users')->with('message', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('users.index'))->with('message', 'User deleted');
    }
}
