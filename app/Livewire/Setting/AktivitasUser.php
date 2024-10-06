<?php

namespace App\Livewire\Setting;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Spatie\Activitylog\Models\Activity;

#[Title('Aktivitas-User')]
class AktivitasUser extends Component
{

    use WithPagination;
    public $search = '';
    public $paginate = 10;
    public $lastActivity;

    public function render()
    {
        $lastActivityUbah = Activity::with(['user.anggota'])
            ->where('event', '!=', 'login') // Kondisi untuk event yang bukan 'login'
            ->orderBy('id', 'desc') // Urutkan berdasarkan kolom id secara descending
            ->paginate($this->paginate);

        $lastActivityLogin = Activity::with(['user.anggota'])
            ->where('event', '=', 'login') // Kondisi untuk event yang 'login'
            ->orderBy('id', 'desc') // Urutkan berdasarkan kolom id secara descending
            ->paginate($this->paginate);

        // dd($lastActivity);
        return view('livewire.setting.aktivitas-user', [
            'lastactivityubah' => $lastActivityUbah,
            'lastactivitylogin' => $lastActivityLogin,
        ]);
    }
}
