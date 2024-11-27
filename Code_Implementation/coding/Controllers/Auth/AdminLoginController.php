<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function getForm(Request $request)
    {
        $isAuth = true;
        return view('auth.login', compact('isAuth'));
    }

    public function postForm(Request $request)
    {
        $credentials = $request->validate([
            'email'         => ['required', 'email'],
            'password'      => ['required']
        ]);
        $rememberMe = $request->has('remember_me') ? true : false;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.home'));
        }
        return back()->withInput()->withErrors(['email' => ['Email or Password not correct']]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }
}
