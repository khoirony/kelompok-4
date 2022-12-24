<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login Aspirasi Masyarakat'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            "email.required" => "Email wajib di isi",
            "password.required" => "Password wajib di isi"
        ]);

        $user = User::where('email', 'like', "%" . $request->email . "%")->first();

        // echo $user->role;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($user->role == 1) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/masyarakat');
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
