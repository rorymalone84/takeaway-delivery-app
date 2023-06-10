<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view('users.create', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        //$stores = Stores::all();
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(),[
            //put fields to be validated here
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
            'store_id' => 'sometimes'
            ]);
        
        User::where('id',$user->id)
            ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'postcode' => $request->input('postcode'),
            'phone' => $request->input('postcode'),
            'store_id' => $request->input('store_id')
        ]);     

        return redirect('/users')->with('message', 'User updated!');
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