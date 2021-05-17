<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:20|unique:users',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = Users::create([
            'password' => Hash::make($request->password),
            'id_group' => 1,
            'username' => $request->name,
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'gender' => $request->gender,
            'nomor_hp' => $request->nomor_hp,
            'created_by' => "BREEZE",
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
