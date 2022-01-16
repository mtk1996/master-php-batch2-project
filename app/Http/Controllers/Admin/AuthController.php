<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $cred = $request->only('email', 'password');
        if (auth()->attempt($cred)) {
            return redirect('/admin/category');
        }
        return redirect()->back()->with('error', 'Wrong Email And Password');
    }


    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
