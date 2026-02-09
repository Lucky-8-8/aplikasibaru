<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword; // untuk fitur reset password (opsional)
use Laravel\Sanctum\HasApiTokens; // jika kamu butuh API token (opsional)

class Siswa extends Authenticatable
{
    use HasApiTokens, Notifiable; // tambahkan HasApiTokens jika butuh API

    protected $table = 'siswa';

    protected $primaryKey = 'id_siswa';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'nis',
        'nama_lengkap',
        'kelas',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tambahkan mutator untuk hash password otomatis saat di-set
    public function setPasswordAttribute($password)
    {
        // Jika password sudah di-hash, jangan di-hash lagi
        if (\Illuminate\Support\Str::startsWith($password, '$2y$')) {
            $this->attributes['password'] = $password;
        } else {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    // Relasi ke Aspirasi
    public function aspirasi()
    {
        return $this->hasMany(Aspirasi::class, 'id_siswa');
    }

    // Relasi ke UmpanBalik
    public function umpanBalik()
    {
        return $this->hasMany(UmpanBalik::class, 'id_siswa');
    }
}
