<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\HistoriAspirasi;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // DASHBOARD ADMIN
    public function dashboard()
    {
        $aspirasi = Aspirasi::with('siswa','kategori')
            ->orderBy('tanggal_pengaduan', 'desc')
            ->get();

        return view('admin.dashboard', compact('aspirasi'));
    }

    // UPDATE STATUS ASPIRASI
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $aspirasi = Aspirasi::findOrFail($id);

        $aspirasi->update([
            'status' => $request->status,
            'id_admin' => Auth::id(),
            'tanggal_selesai' => $request->status === 'Selesai' ? now() : null
        ]);

        // SIMPAN HISTORI
        HistoriAspirasi::create([
            'id_aspirasi' => $id,
            'status_baru' => $request->status,
            'catatan' => $request->catatan,
            'tanggal' => now()
        ]);

        return back()->with('success', 'Status aspirasi berhasil diperbarui');
    }
}