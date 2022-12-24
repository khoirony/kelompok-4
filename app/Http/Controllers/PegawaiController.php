<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Aduan;
use App\Models\Aspirasi;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('dashboard.pegawai.index', [
            'title' => 'Dashboard',
        ]);
    }

    public function aduanmasuk()
    {
        $aduanmasuk  = Aspirasi::where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('dashboard.pegawai.aduanmasuk', [
            'title' => 'Pengaduan Masuk',
            'aduanmasuk' => $aduanmasuk
        ]);
    }

    public function kelolatanggapan($id)
    {
        $aduan  = Aspirasi::where('id', $id)->first();
        return view('dashboard.pegawai.kelolatanggapan', [
            'title' => 'Kelola Aduan',
            'aduan' => $aduan,
            'id' => $id
        ]);
    }
}
