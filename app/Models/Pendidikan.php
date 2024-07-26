<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Anggota()
    {
        return $this->hasOne(Anggota::class, 'id', 'id_anggota');
    }
}
