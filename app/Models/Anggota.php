<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Cabang()
    {
        return $this->hasOne(Cabang::class, 'cabang_cd', 'cabang');
    }
    public function Ranting()
    {
        return $this->hasOne(Cabang::class, 'cabang_cd', 'ranting');
    }

    public function GolDarah()
    {
        return $this->hasOne(GolonganDarah::class, 'id', 'gol_darah');
    }

    public function Profesi()
    {
        return $this->hasOne(Profesi::class, 'id', 'profesi');
    }
    public function Pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, 'id', 'pekerjaan');
    }

    public function presensis()
    {
        return $this->hasMany(Presensi::class, 'no_anggota', 'no_anggota');
    }
}
