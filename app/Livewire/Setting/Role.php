<?php

namespace App\Livewire\Setting;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\Role as ModelsRole;

#[Title('Role')]

class Role extends Component
{
    use WithPagination;

    public $search = '';
    public $nama;
    public $dataRoles;
    public $updatedata = false;
    public $role_id;
    public $paginate = 5;
    public function store()
    {
        $rules = [
            'nama' => 'required',
        ];
        $pesan = [

            'nama.required' => 'Golongan darah wajib diisi !',
        ];
        $validated = $this->validate($rules, $pesan);
        ModelsRole::create($validated);
        // session()->flash('message', 'Data berhasil di-simpan');

        $this->js(<<<'JS'
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
        Toast.fire({
        icon: "success",
        title: "Data berhasil disimpan"
        });
        JS);

        $this->clear();
    }

    public function edit($id)
    {
        $data = ModelsRole::find($id);
        $this->nama = $data->nama;

        $this->updatedata = true;
        $this->role_id = $id;
    }

    public function update()
    {
        $rules = [
            'nama' => 'required',
        ];
        $pesan = [
            'nama.required' => 'Golongan darah wajib diisi !',
        ];
        $validated = $this->validate($rules, $pesan);
        $data = ModelsRole::find($this->role_id);
        $data->update($validated);

        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil diupdate');

        $this->clear();
    }

    public function delete_confirmation($id)
    {

        $this->role_id = $id;
        $this->js(<<<'JS'
        Swal.fire({
            title: 'Apakah Anda yakin?',
                text: "Apakah kamu ingin menghapus data ini? proses ini tidak dapat dikembalikan.",
                 icon: "warning",
                // imageUrl: "/icon-warning.png",
                // imageWidth: 90,
                // imageHeight: 85,
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
        ModelsRole::destroy($this->role_id);
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
        $this->role_id = '';
    }

    public function render()
    {
        if ($this->search) {
            $this->resetPage();
        }


        // $this->dataRoles = ModelsRole::orderBy('id', 'asc')->get();
        // return view('livewire.golongan-darah');
        return view('livewire.setting.role', [
            'roles' => ModelsRole::where('nama', 'like', '%' . $this->search . '%')->paginate($this->paginate),
        ]);
    }
}
