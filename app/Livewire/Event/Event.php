<?php

namespace App\Livewire\Event;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Event as ModelsEvent;

#[Title('Event')]
class Event extends Component
{
    use WithPagination;

    public $nama_event, $tanggal_event, $lokasi, $event_id;
    public $search = '';
    public $paginate = 10;

    protected $paginationTheme = 'bootstrap'; // Optional, untuk template seperti Bootstrap

    public function create()
    {
        $this->validate([
            'nama_event' => 'required|string',
            'tanggal_event' => 'required|date',
            'lokasi' => 'required|string',
        ]);

        ModelsEvent::create([
            'nama_event' => $this->nama_event,
            'tanggal_event' => $this->tanggal_event,
            'lokasi' => $this->lokasi,
        ]);

        $this->resetForm();
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil disimpan');
        $this->js(<<<'JS'
        $('#eventModal').modal('hide');
     JS);
    }

    public function edit($id)
    {
        $event = ModelsEvent::findOrFail($id);

        // Mengisi form dengan data event yang ingin diedit
        $this->event_id = $event->id;
        $this->nama_event = $event->nama_event;
        $this->tanggal_event = $event->tanggal_event;
        $this->lokasi = $event->lokasi;
        $this->js(<<<'JS'
        $('#eventModal').modal('show');
     JS);
    }

    public function update()
    {
        $this->validate([
            'nama_event' => 'required|string',
            'tanggal_event' => 'required|date',
            'lokasi' => 'required|string',
        ]);

        $event = ModelsEvent::findOrFail($this->event_id);

        // Mengupdate data event
        $event->update([
            'nama_event' => $this->nama_event,
            'tanggal_event' => $this->tanggal_event,
            'lokasi' => $this->lokasi,
        ]);

        $this->resetForm();
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil diupdate');
        $this->js(<<<'JS'
        $('#eventModal').modal('hide');
     JS);
    }

    public function resetForm()
    {
        $this->event_id = null; // Reset event ID ketika form direset
        $this->nama_event = '';
        $this->tanggal_event = '';
        $this->lokasi = '';
    }

    public function delete_confirmation($id)
    {
        $this->event_id = $id;
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
        ModelsEvent::destroy($this->event_id);
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil dihapus');
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Agar pagination kembali ke halaman pertama ketika search berubah
    }

    public function FormEvent()
    {
        $this->event_id = false;
        $this->resetForm();
        $this->js(<<<'JS'
        $('#eventModal').modal('show');
     JS);
    }
    public function CloseFormEvent()
    {
        $this->js(<<<'JS'
        $('#eventModal').modal('hide');
     JS);
    }

    public function render()
    {
        // Query dengan search dan pagination
        $events = ModelsEvent::where('nama_event', 'like', '%' . $this->search . '%')
            ->orWhere('lokasi', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate);

        return view('livewire.event.event', [
            'events' => $events,
        ]);
    }
}
