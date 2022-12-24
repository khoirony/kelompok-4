<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class AdminController extends Controller
{
    public function index(Request $request){
        $responseAspirasi = HttpClient::fetch(
            "GET",
            "http://localhost:8001/api/aspirasi/list"
        );
        $aspirasi = $responseAspirasi["data"];

        return view('user.index', [
            'aspirasi' => $aspirasi,
            'title' => 'Dashboard Admin'
        ]);
    }

    function detail($id)
    {
        $responseAspirasi = HttpClient::fetch(
            "GET",
            "http://localhost:8001/api/aspirasi/".$id
        );
        $aspirasi = $responseAspirasi["data"];

        $payload['role'] = 1;
        $responseStatus = HttpClient::fetch(
            "POST",
            "http://localhost:8001/api/aspirasi/".$id."/update",
            $payload
        );
        // dd($Aspirasi);
        return view('admin.detail', [
            'aspirasi' => $aspirasi,
            'title' => 'Halaman Detail Aspirasi'
        ]);
    }

    function create()
    {
        return view('admin.create', [
            'title' => 'Tambah Admin'
        ]);
    }
    
    function store(Request $request)
    {
        $payload = $request->all();

        if($request->file() != null){
            $file = ['image' => $request->file('image')];
        }else{
            $file = $request->file();
        }

        $responseAdmin = HttpClient::fetch(
            "POST",
            "http://localhost:8001/api/user",
            $payload,
            $file
        );
        
        $admin = $responseAdmin["data"];
        return redirect('/admin');
    }
}
