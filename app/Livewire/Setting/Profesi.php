<?php

namespace App\Livewire\Setting;


use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Models\Profesi as ModelsProfesi;

#[Title('Profesi')]

class Profesi extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search = '';
    public $paginate = 10;
    public $nama;
    public $dataProfesis;
    public $updatedata = false;
    public $profesi_id;

    public function store()
    {
        $rules = [
            'nama' => 'required',
        ];
        $pesan = [

            'nama.required' => 'Golongan darah wajib diisi',
        ];
        $validated = $this->validate($rules, $pesan);
        ModelsProfesi::create($validated);
        // session()->flash('message', 'Data berhasil di-simpan');
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil disimpan');

        $this->clear();
    }

    public function edit($id)
    {
        $data = ModelsProfesi::find($id);
        $this->nama = $data->nama;

        $this->updatedata = true;
        $this->profesi_id = $id;
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
        $data = ModelsProfesi::find($this->profesi_id);
        $data->update($validated);

        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil diupdate');

        $this->clear();
    }

    public function delete_confirmation($id)
    {

        $this->profesi_id = $id;
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
        ModelsProfesi::destroy($this->profesi_id);
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
        $this->profesi_id = '';
    }

    public function render()
    {
        if ($this->search) {
            $this->resetPage();
        }
        return view('livewire.setting.profesi', [
            'dataprofesis' => ModelsProfesi::where('nama', 'like', '%' . $this->search . '%')->orderBy('id', 'asc')->paginate($this->paginate),
        ]);
    }
}
