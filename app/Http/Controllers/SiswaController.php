<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\HistoriAspirasi;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    // DASHBOARD SISWA
    public function dashboard()
    {
        $aspirasi = Aspirasi::where('id_siswa', Auth::id())
            ->orderBy('tanggal_pengaduan', 'desc')
            ->get();

        $kategori = Kategori::all();

        return view('siswa.dashboard', compact('aspirasi','kategori'));
    }

    // SIMPAN ASPIRASI
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $aspirasi = Aspirasi::create([
            'id_siswa' => Auth::id(),
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal_pengaduan' => now(),
            'status' => 'Dikirim'
        ]);

        // HISTORI AWAL
        HistoriAspirasi::create([
            'id_aspirasi' => $aspirasi->id_aspirasi,
            'status_baru' => 'Dikirim',
            'catatan' => 'Aspirasi dikirim oleh siswa',
            'tanggal' => now()
        ]);

        return back()->with('success', 'Aspirasi berhasil dikirim');
    }
}