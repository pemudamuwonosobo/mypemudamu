<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Anggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'no_anggota',
        'waktu_hadir',
    ];
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'no_anggota', 'no_anggota');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
