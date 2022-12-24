<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Aduan;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $aduanmasuk  = Aspirasi::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.index', [
            'title' => 'Aspirasi Masuk',
            'aduanmasuk' => $aduanmasuk
        ]);
    }

    public function tambahpegawai()
    {
        $user   = User::where('role', 1)
            ->where('id', '!=', Auth::user()->id)->paginate(10);
        return view('dashboard.admin.tambahpegawai', [
            'title' => 'Tambah Pegawai',
            'user' => $user,
            'n' => 1
        ]);
    }

    public function storepegawai(Request $request)
    {
        // dd($request);

        $validation = $request->validate([
            "nama" => "required|max:255",
            "email" => "required|email",
            "password" => "required|min:6",
            "password_confirmation" => "required|same:password"
        ], [
            'nama.required' => 'Nama pegawai wajib diisi.',
            'email.required' => 'Email wajib di isi.',
            'password.required' => 'Password wajib di isi.',
            "password.min" => "Password minimal 6 karakter.",
            'password_confirmation.required' => 'Password Confirmation wajib di isi.',
            "password_confirmation.same" => "Password wajib harus sama dengan password."
        ]);

        $user = new User;
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 1;
        $user->save();

        return redirect('/tambahpegawai')->with('success', 'Pegawai Berhasil Ditambah');
    }

    public function editpegawai($id)
    {
        $pegawai = User::where('id', $id)->where('role', 1)->first();
        return view('dashboard.admin.editpegawai', [
            'title' => 'Edit pegawai',
            'pegawai' => $pegawai,
            'n' => 1
        ]);
    }

    public function updatepegawai(Request $request)
    {
        if (strcmp($request->input('repassword'), $request->input('password')) != 0) {
            return redirect()->back()->with('error', 'Password dan repassword tidak boleh berbeda.');
        }

        $user = User::find($request->input('id'));
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->update();

        return redirect('/tambahpegawai')->with('success', 'pegawai Berhasil Ditambah');
    }

    public function hapuspegawai($id)
    {
        $user = User::where('id', $id)->where('role', 1)->delete();
        return redirect('/tambahpegawai')->with('success', 'Pegawai Berhasil Dihapus');
    }
}
