<?php

namespace App\Livewire\Event;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Crypt;
use App\Models\Presensi as ModelsPresensi;
use Livewire\Attributes\Layout;

#[Title('Presensi')]
class Presensi extends Component
{
    use WithPagination;

    public $event_id, $no_anggota, $status, $presensi_id, $waktu_hadir;
    public $nama_event, $tanggal_event, $lokasi;
    public $eventId;
    public $search = '';
    public $paginate = 10;
    public $anggota, $fotoAnggota, $namaAnggota, $cabangAnggota;

    protected $paginationTheme = 'bootstrap';


    public function createPresensi()
    {
        $this->validate([
            'event_id' => 'required|exists:events,id',
            'no_anggota' => 'required|exists:anggotas,id',
            'status' => 'required|string',
            'waktu_hadir' => 'nullable|date',
        ]);

        ModelsPresensi::create([
            'event_id' => $this->event_id,
            'no_anggota' => $this->no_anggota,
            'status' => $this->status,
            'waktu_hadir' => $this->waktu_hadir ? Carbon::parse($this->waktu_hadir) : null,
        ]);

        $this->resetForm();
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil disimpan');
        $this->js(<<<'JS'
        $('#presensiModal').modal('hide');
        JS);
    }

    public function delete_confirmation($id)
    {
        $this->presensi_id = $id;
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Apakah kamu ingin menghapus data ini? proses ini tidak dapat dikembalikan.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $wire.delete()
            }
        });
        JS);
    }

    public function delete()
    {
        ModelsPresensi::destroy($this->presensi_id);
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil dihapus');
    }

    public function resetForm()
    {
        $this->event_id = '';
        $this->no_anggota = '';
        $this->status = '';
        $this->waktu_hadir = '';
    }
    public function openFormPresensi()
    {
        $this->resetForm(); // Reset form fields
        $this->js(<<<'JS'
        $('#presensiModal').modal('show');
     JS);
    }

    public function closeFormPresensi()
    {
        $this->js(<<<'JS'
        $('#presensiModal').modal('hide');
     JS);
    }

    public function mount($eventId = null)
    {
        try {
            // Jika $eventId tidak null, dekripsi ID
            $this->event_id = $eventId ? Crypt::decryptString($eventId) : 'default_value';

            // Cari event berdasarkan ID yang sudah didekripsi
            $event = Event::find($this->event_id);

            // Jika event ditemukan, set properti Livewire
            if ($event) {
                $this->nama_event = $event->nama_event;
                $this->tanggal_event = $event->tanggal_event;
                $this->lokasi = $event->lokasi;
            } else {
                // Jika event tidak ditemukan, Anda bisa mengatur nilai default atau error handling
                $this->nama_event = 'Event tidak ditemukan';
                $this->tanggal_event = null;
                $this->lokasi = null;
            }
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat dekripsi atau lainnya, Anda bisa menangani exception
            $this->event_id = null;
            $this->nama_event = 'Invalid event ID';
            $this->tanggal_event = null;
            $this->lokasi = null;
        }
    }

    // Fungsi untuk menyimpan presensi
    public function savePresensi()
    {
        // Validasi input
        $this->validate([
            'no_anggota' => 'required',
        ]);
        // Cek apakah no_anggota ada di tabel anggota
        $this->anggota = Anggota::where('no_anggota', $this->no_anggota)->first();

        if (!$this->anggota) {
            // Reset input setelah scan berhasil
            $this->anggota = Anggota::where('no_anggota', $this->no_anggota)->first();
            $this->namaAnggota = $this->anggota->nama;
            $namaAnggota = json_encode($this->namaAnggota); // Pastikan string dienkode dengan benar

            // Tampilkan SweetAlert jika anggota tidak ditemukan
            $this->js(<<<JS
        Swal.fire({
            title: "Maaf",
            text: "Anda Belum Terdaftar di My-PemudaMu",
            icon: "error",
            timer: 3000,
            showConfirmButton: false
        });
        JS);
            return;
        }

        // Simpan presensi
        ModelsPresensi::create([
            'event_id' => $this->event_id,
            'no_anggota' => $this->no_anggota,
            'waktu_hadir' => Carbon::now(),
        ]);

        // Reset input setelah scan berhasil
        $this->anggota = Anggota::where('no_anggota', $this->no_anggota)->first();
        $this->namaAnggota = $this->anggota->nama;
        $namaAnggota = json_encode($this->namaAnggota); // Pastikan string dienkode dengan benar

        $this->js(<<<JS
        Swal.fire({
            title: "Selamat, " + $namaAnggota + "!",
            text: "Anda Berhasil Presensi",
            icon: "success",
            imageWidth: 120,
            imageHeight: 110,
            timer: 3000,
            showConfirmButton: false
        });
    JS);
    }

    // Fungsi untuk menangani scan dari kamera QR
    public function handleScan($scannedCode)
    {
        $this->no_anggota = $scannedCode;
        $presensiExists = ModelsPresensi::where('event_id', $this->event_id)
            ->where('no_anggota', $this->no_anggota)
            ->exists();


        if ($presensiExists) {
            $this->anggota = Anggota::where('no_anggota', $this->no_anggota)->first();
            $this->namaAnggota = $this->anggota->nama;
            $namaAnggota = json_encode($this->namaAnggota);
            $this->js(<<<JS
            Swal.fire({
                title: "Maaf, " + $namaAnggota + "!",
                text: " Anda Sudah Pernah Presensi",
                icon: "error",
                imageWidth: 120,
                imageHeight: 110,
                timer: 3000,
                showConfirmButton: false
            });
        JS);
        } else {
            $this->savePresensi(); // Simpan presensi otomatis setelah QR discan
        }
    }

    public function render()
    {
        $presensis = ModelsPresensi::where(function ($query) {
            $query->whereHas('event', function ($query) {
                $query->where('nama_event', 'like', '%' . $this->search . '%');
            })
                ->orWhereHas('anggota', function ($query) {
                    $query->where('nama', 'like', '%' . $this->search . '%'); // Mencari berdasarkan nama anggota
                });
        })
            ->where('event_id', $this->event_id) // Pastikan kondisi event_id selalu diterapkan
            ->orderBy('id', 'desc')
            ->paginate($this->paginate);

        $jumlahPresensi = $presensis->count();
        $events = Event::all();

        return view('livewire.event.presensi', [
            'presensis' => $presensis,
            'jumlahpresensi' => $jumlahPresensi,
            'events' => $events,
            'namaEvent' => $this->nama_event,
            'tanggalEvent' => $this->tanggal_event,
            'lokasiEvent' => $this->lokasi
        ])->layout('components.layouts.frontend');
    }
}
