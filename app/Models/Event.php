<?php

namespace App\Models;

use App\Models\Presensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function presensis()
    {
        return $this->hasMany(Presensi::class);
    }
}
