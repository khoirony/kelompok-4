<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class UserController extends Controller
{
    public function index(Request $request){
        $responseAspirasi = HttpClient::fetch(
            "GET",
            "http://localhost:8001/api/aspirasi/list"
        );
        $aspirasi = $responseAspirasi["data"];
        $data = [];
        // dd($aspirasi);

        foreach ($aspirasi as $as) {
            if($request->session()->get('id') == $as['id_user']) {
                $data[] = $as;
            }
        }

        return view('user.index', [
            'aspirasi' => $data,
            'title' => 'Dashboard user'
        ]);
    }

    function create()
    {
        return view('aspirasi.create', [
            'title' => 'Tambah Aspirasi'
        ]);
    }
    
    function store(Request $request)
    {
        $payload = $request->all();

        if($request->file() != null){
            $file = ['gambar' => $request->file('gambar')];
        }else{
            $file = $request->file();
        }

        $responseAspirasi = HttpClient::fetch(
            "POST",
            "http://localhost:8001/api/aspirasi",
            $payload,
            $file
        );
        
        $aspirasi = $responseAspirasi["data"];
        return redirect('/user');
    }
}
