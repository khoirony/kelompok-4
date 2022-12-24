<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    function register()
    {
        return view('register.index', [
            'title' => 'Halaman Register',
        ]);
    }

    function registerprocess(Request $request)
    {

        $payload = $request->all();
        $payload['password'] = Hash::make($request->input('password'));
        
        dd($payload['password']);
        $responseRegister = HttpClient::fetch(
            "POST",
            "http://localhost:8001/api/user",
            $payload
        );
        
        $data = $responseRegister["data"];
        return redirect('/')->with('success', 'Registration successfull Please Login');
    }
}
