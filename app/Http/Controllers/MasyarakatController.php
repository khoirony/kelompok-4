<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    public function index()
    {

        $aduan = Aspirasi::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.masyarakat.index', [
            'title' => 'List Aspirasi',
            'aduan' => $aduan
        ]);
        // $aduanmasuk  = Aspirasi::where('status', 0)->where('id_user', Auth::user()->id)->count();
        // $aduandiproses  = Aspirasi::where('status', 1)->where('id_user', Auth::user()->id)->count();
        // $aduanselesai  = Aspirasi::where('status', 2)->where('id_user', Auth::user()->id)->count();
        // $aduanditolak  = Aspirasi::where('status', 9)->where('id_user', Auth::user()->id)->count();
        // return view('dashboard.masyarakat.index', [
        //     'title' => 'Dashboard',
        //     'aduanmasuk' => $aduanmasuk,
        //     'aduandiproses' => $aduandiproses,
        //     'aduanselesai' => $aduanselesai,
        //     'aduanditolak' => $aduanditolak
        // ]);
    }

    public function tambahaduan()
    {
        return view('dashboard.masyarakat.tambahaduan', [
            'title' => 'Tambah Aspirasi'
        ]);
    }

    public function storeaduan(Request $request)
    {
        $request->validate([
            'isi_aspirasi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        // dd($request);
        if ($request->hasFile("gambar")) {
            $file = $request->file('gambar');
            $name = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'aduan';
            $file->move($tujuan_upload, $name);
        }

        $aduan = new Aspirasi();
        $aduan->id_user = $request->input('id');
        $aduan->isi_aspirasi = $request->input('isi_aspirasi');
        $aduan->gambar = isset($name) ? $name : null;
        $aduan->status = 0;
        $aduan->save();

        return redirect('/tambahaduan')->with('success', 'Aduan Sukses Terkirim');
    }

    // public function historyaduan()
    // {
    //     $aduan = Aspirasi::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->get();
    //     return view('dashboard.masyarakat.historyaduan', [
    //         'title' => 'History Aduan',
    //         'aduan' => $aduan
    //     ]);
    // }

    public function editaduan($id)
    {
        // $aduan  = Aspirasi::where('id_user', $id)->first();
        $aduan = Aspirasi::find($id);
        // dd($aduan);
        return view('dashboard.masyarakat.editaduan', [
            'title' => 'Kelola Aduan',
            'aduan' => $aduan,
        ]);
    }

    public function storeedit(Request $request)
    {
        $request->validate([
            'aduan' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $name = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'aduan';
            $file->move($tujuan_upload, $name);
        }

        $aduan = Aspirasi::find($request->input('id'));
        $aduan->isi_aspirasi = $request->input('aduan');
        $aduan->gambar = isset($name) ? $name : $aduan->gambar;
        $aduan->status = 0;
        $aduan->update();

        return redirect('/masyarakat')->with('success', 'Aduan Sukses Diedit');
    }

    public function hapusaduan($id)
    {
        $aduan = Aspirasi::where('id', $id)->delete();
        return redirect('/masyarakat')->with('success', 'Aduan Berhasil Dihapus');
    }
}
