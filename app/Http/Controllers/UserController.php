<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
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
    public function update(Request $request, User $user)
    {
        $this->validate(request(),[
            //put fields to be validated here
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postcode' => 'required',
            'phone' => 'required',
            'store_id' => 'sometimes'
        ]);

        User::where('id',$user->id)
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

        return redirect('/users')->with('message','User deleted');
    }
}