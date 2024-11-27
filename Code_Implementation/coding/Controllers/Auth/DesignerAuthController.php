<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Designer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DesignerAuthController extends Controller
{
    public function getLoginForm(Request $request)
    {
        $isAuth = true;
        return view('auth.designer.login', compact('isAuth'));
    }

    public function postLoginForm(Request $request)
    {
        $credentials = $request->validate([
            'email'         => ['required', 'email'],
            'password'      => ['required']
        ]);
        if (auth('designers')->attempt($credentials)) {
            if(auth('designers')->user()->account_status != 'active'){
                auth('designers')->logout();
                return back()->withInput()->withErrors(['email' => ['Your account has been suspended.']]);
            }
            $request->session()->regenerate();

            return redirect()->intended(route('designer.home'));
        }
        return back()->withInput()->withErrors(['email' => ['Email or Password not correct']]);
    }

    public function getRegisterForm(Request $request)
    {
        $isAuth = true;
        return view('auth.designer.register', compact('isAuth'));
    }

    public function postRegisterForm(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|min:2|max:80',
            'email'     => 'required|email|unique:designer,email',
            'password'  => 'required|string|confirmed|min:8',
            'address'   => 'required|max:100',
            'phone'     => 'required|numeric|saudi_phone|unique:designer,phone' 
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = Designer::create($data);
        auth('designers')->login($user);
        return redirect()->intended(route('designer.home'));
    }

    public function logout()
    {
        auth('designers')->logout();
        return redirect(route('designer.login'));
    }
}
