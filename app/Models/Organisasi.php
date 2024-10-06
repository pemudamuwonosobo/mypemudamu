<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organisasi extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->logOnlyDirty();
    }
    public function Anggota()
    {
        return $this->hasOne(Anggota::class, 'id', 'id_anggota');
    }
}
