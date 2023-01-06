<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => 'admin',
            'password' => $request->password
        ])) {
            // Success auth
            return redirect()->intended(route('admin.home'));
        }

        return redirect()->intended(route('admin.loginForm'));
    }
}
