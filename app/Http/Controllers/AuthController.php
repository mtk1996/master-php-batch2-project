<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $user = User::where('email', $request->email);

        //email exist
        if (!$user->exists()) {
            return redirect()->back()->with('error', 'Email Not Found In Our Records');
        }

        if (!Hash::check($request->password, $user->first()->password)) {
            return redirect()->back()->with('error', 'Wrong Password');
        }

        auth()->login($user->first());
        return redirect('/')->with('success', 'Welcome Back ' . auth()->user()->name);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $file = $request->file('image');
        $file_name = uniqid() . $file->getClientOriginalName();
        Storage::disk('images')->put($file_name, file_get_contents($file));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $file_name,
        ]);

        auth()->login($user);
        return redirect('/')->with('success', 'Welcome ' . $user->name);
    }


    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
