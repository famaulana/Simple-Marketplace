<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages/login');
    }

    public function post(Request $request)
    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'err' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
