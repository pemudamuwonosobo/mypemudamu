<?php

namespace App\Livewire\Client;

use App\Models\Anggota;
use App\Models\Presensi;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventClient extends Component
{
    use WithPagination;

    public $search = '';
    public $paginate = 10; // Jumlah data per halaman

    public function render()
    {
        // Ambil data user yang sedang login
        $user_login = Anggota::where('email', Auth::user()->email)->first();
        $no_anggota = $user_login->no_anggota;

        // Reset pagination saat search berubah
        if ($this->search) {
            $this->resetPage();
        }

        // Query untuk mengambil riwayat event berdasarkan no_anggota
        $RiwayatEvent = Presensi::with('event') // Pastikan relasi ini ada di model Presensi
            ->where('no_anggota', $no_anggota)
            ->whereHas('event', function ($query) {
                $query->where('nama_event', 'like', '%' . $this->search . '%'); // Sesuaikan dengan kolom nama_event di tabel event
            })
            ->paginate($this->paginate);

        // Mengirimkan data ke view
        return view('livewire.client.event-client', [
            'riwayatEvent' => $RiwayatEvent,
        ]);
    }
}
