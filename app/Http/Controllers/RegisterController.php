<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'password_confirmation' => 'required|same:password',
            'nik' => 'required',
            'tentang' => 'max:255',
            'no_telp' => 'required|max:16',
            'alamat' => 'max:255',
            'gambar' => 'image|file|max:1024'
        ], [
            'nama.required' => "Nama wajib di isi.",
            'email.required' => "Email wajib di isi.",
            'password.required' => "Password wajib di isi.",
            'password_confirmation.required' => "Password wajib di isi.",
            'password_confirmation.same' => "Password confirmation wajib sama dengan password",
            'nik.required' => 'NIK wajib di isi.',
            'tentang.required' => 'Tentang wajib di isi.',
            'no_telp.required' => 'No Telp wajib di isi.',
            'alamat.required' => 'Alamat wajib di isi.',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.max' => 'max file tidak boleh lebih dari 1mb'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData["role"] = 2;

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration succesfull! Please Login');
        return redirect('/')->with('success', 'Registration successfull Please Login');
    }
}
