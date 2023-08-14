<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\StoreUserRequest;
use App\Providers\RouteServiceProvider;
use JustSteveKing\LaravelPostcodes\Rules\Postcode;
use JustSteveKing\LaravelPostcodes\Service\PostcodeService;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'postcode' => $request->input('postcode'),
            'phone' => $request->input('phone'),
        ])->assignRole('customer');;

        event(new Registered($user));

        Auth::login($user);

        return redirect('/users/dashboard');
    }
}