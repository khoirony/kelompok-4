<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;

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

        $responseRegister = HttpClient::fetch(
            "POST",
            "http://localhost:8001/api/user",
            $payload
        );
        
        $data = $responseRegister["data"];
        return redirect('/')->with('success', 'Registration successfull Please Login');
    }
}
