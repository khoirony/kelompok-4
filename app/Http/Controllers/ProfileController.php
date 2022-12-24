<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile', [
            'title' => 'Profile',
            'active' => 'profile'
        ]);
    }

    public function edit(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);


        if ($request->hasFile("gambar")) {
            $file = $request->file('image');
            $name = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'profpic';
            $file->move($tujuan_upload, $name);
        }

        $user = User::find($request->input('id'));
        $user->nik = $request->input('nik');
        $user->nama = $request->input('nama');
        $user->image = isset($name) ? $name : $user->gambar;
        $user->tentang = $request->input('tentang');
        $user->alamat = $request->input('alamat');
        $user->no_telp = $request->input('no_telp');
        $user->email = $request->input('email');
        $user->update();

        return redirect('/profile')->with('success', 'Data Sukses Diedit');
    }

    public function changepass(Request $request)
    {

        $validation = $request->validate([
            "current_password" => "required",
            "password" => "required|min:5",
            "password_confirmation" => "required|same:password"
        ], [
            "current_password.required" => "Wajib memasukkan password saat ini.",
            "current_password.exists" => "Password saat ini tidak valid.",
            'password.required' => 'Password wajib di isi.',
            "password.min" => "Password minimal 5 karakter.",
            'password_confirmation.required' => 'Password Confirmation wajib di isi.',
            "password_confirmation.same" => "Password wajib harus sama dengan password."
        ]);

        //Change Password
        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->input('password'));
        $user->update();

        return redirect('/profile')->with('success', 'Password Sukses Diganti');
    }
}
