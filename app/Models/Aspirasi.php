<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasi';
    protected $primaryKey = 'id_aspirasi';

    protected $fillable = [
        'id_siswa',
        'id_kategori',
        'id_admin',
        'judul',
        'deskripsi',
        'tanggal_pengaduan',
        'status',
        'tanggal_selesai'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function histori()
    {
        return $this->hasMany(HistoriAspirasi::class, 'id_aspirasi');
    }

    public function umpanBalik()
    {
        return $this->hasMany(UmpanBalik::class, 'id_aspirasi');
    }
}