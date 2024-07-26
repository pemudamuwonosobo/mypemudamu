<?php

namespace App\Livewire\Setting;

use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Pekerjaan as ModelsPekerjaan;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Pekerjaan')]

class Pekerjaan extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search = '';
    public $paginate = 10;

    public $nama;
    public $dataPekerjaans;
    public $updatedata = false;
    public $pekerjaan_id;

    public function store()
    {
        $rules = [
            'nama' => 'required',
        ];
        $pesan = [

            'nama.required' => 'Golongan darah wajib diisi',
        ];
        $validated = $this->validate($rules, $pesan);
        ModelsPekerjaan::create($validated);
        // session()->flash('message', 'Data berhasil di-simpan');
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil disimpan');

        $this->clear();
    }

    public function edit($id)
    {
        $data = ModelsPekerjaan::find($id);
        $this->nama = $data->nama;

        $this->updatedata = true;
        $this->pekerjaan_id = $id;
    }

    public function update()
    {
        $rules = [
            'nama' => 'required',
        ];
        $pesan = [
            'nama.required' => 'Golongan darah wajib diisi',
        ];
        $validated = $this->validate($rules, $pesan);
        $data = ModelsPekerjaan::find($this->pekerjaan_id);
        $data->update($validated);

        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil diupdate');

        $this->clear();
    }

    public function delete_confirmation($id)
    {

        $this->pekerjaan_id = $id;
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Apakah Anda yakin?',
                text: "Apakah kamu ingin menghapus data ini? proses ini tidak dapat dikembalikan.",
                icon: 'warning',
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
        ModelsPekerjaan::destroy($this->pekerjaan_id);
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil dihapus');
        $this->clear();
    }

    public function back_store()
    {
        $this->updatedata = false;
        $this->clear();
    }
    public function clear()
    {
        $this->nama = '';
        $this->updatedata = false;
        $this->pekerjaan_id = '';
    }
    public function render()
    {
        if ($this->search) {
            $this->resetPage();
        }

        // $this->dataPekerjaans = ModelsPekerjaan::orderBy('id', 'asc')->get();
        return view('livewire.setting.pekerjaan', [
            'datapekerjaans' => ModelsPekerjaan::where('nama', 'like', '%' . $this->search . '%')->orderBy('id', 'asc')->paginate($this->paginate),
        ]);
    }
}
