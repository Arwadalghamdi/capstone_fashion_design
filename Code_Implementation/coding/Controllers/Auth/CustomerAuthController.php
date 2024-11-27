<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Designer;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    use UploadFile;

    public function getLoginForm(Request $request)
    {
        $isAuth = true;
        return view('auth.customer.login', compact('isAuth'));
    }

    public function postLoginForm(Request $request)
    {
        $credentials = $request->validate([
            'email'         => ['required', 'email'],
            'password'      => ['required']
        ]);
        if (auth('customers')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('customer.home'));
        }
        return back()->withInput()->withErrors(['email' => ['Email or Password not correct']]);
    }

    public function getRegisterForm(Request $request)
    {
        $isAuth = true;
        return view('auth.customer.register', compact('isAuth'));
    }

    public function postRegisterForm(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|min:2|max:80',
            'email'     => 'required|email|unique:customer,email',
            'password'  => 'required|string|confirmed|min:8',
            'address'   => 'required|max:100',
            'phone'     => 'required|numeric|saudi_phone|unique:customer,phone',
            'profile_picture' => 'nullable|image',
        ]);
        $data['password'] = Hash::make($data['password']);
        $data['profile_picture'] = isset($data['profile_picture']) && $request->hasFile('profile_picture') ? $this->upload($request->profile_picture) : null;
        $user = Customer::create($data);
        auth('customers')->login($user);
        return redirect()->intended(route('customer.home'));
    }

    public function logout()
    {
        auth('customers')->logout();
        return redirect(route('customer.login'));
    }
}
