<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nis',
        'nama_lengkap',
        'kelas',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function aspirasi()
    {
        return $this->hasMany(Aspirasi::class, 'id_siswa');
    }

    public function umpanBalik()
    {
        return $this->hasMany(UmpanBalik::class, 'id_siswa');
    }
}
