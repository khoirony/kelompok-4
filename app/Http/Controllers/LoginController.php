<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('login.index', [
            'title' => 'Login Aspirasi Masyarakat'
        ]);
    }

    public function loginprocess(Request $request){
        $login = 0;
        $responseLogin = HttpClient::fetch(
            "GET",
            "http://localhost:8001/api/user/list"
        );
        $data = $responseLogin["data"];

        foreach($data as $user){
            // cek email
            
            if (strcmp($request->input('email'), $user['email']) == 0 && Hash::check($request->input('password'), $user['password']) == true){
                // insert data user to session
                $request->session()->put($user);
                $login = 1;
            }
        }

        if($login != 0){
            if($user['role'] == 1){
                return redirect()->intended('/admin');
            }elseif($user['role'] == 2){
                return redirect()->intended('/user');
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
