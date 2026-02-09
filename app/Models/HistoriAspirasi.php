<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmpanBalik extends Model
{
    protected $table = 'umpan_balik';
    protected $primaryKey = 'id_umpan_balik';

    protected $fillable = [
        'id_aspirasi',
        'id_siswa',
        'pesan',
        'tanggal'
    ];

    public function aspirasi()
    {
        return $this->belongsTo(Aspirasi::class, 'id_aspirasi');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}