<?php

namespace App\Livewire\Kta;

use App\Models\Anggota;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('e-KTA')]

class DesainKta extends Component
{

    public function render()
    {
        $user_login = Anggota::where('email', Auth::user()->email)->first();

        return view('livewire.kta.desain-kta', [
            'data' => $user_login,
        ])->layout('components.layouts.idcard');
    }
}
