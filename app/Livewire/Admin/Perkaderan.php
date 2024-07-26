<?php

namespace App\Livewire\Admin;

use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Models\Perkaderan as ModelsPerkaderan;

#[Title('Perkaderan')]

class Perkaderan extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search = '';
    public $paginate = 10;
    public $id_anggota;
    public $nama_perkaderan;
    public $penyelenggara;
    public $tahun;
    public $dataperkaderans;
    public $updatedata = false;
    public $perkaderan_id;
    public $years = [];
    public $anggotas;


    public function mount()
    {
        $this->anggotas = Anggota::all();
        $this->years = $this->generateYears();
    }
    public function store()
    {
        $rules = [
            'id_anggota' => 'required',
            'penyelenggara' => 'required',
            'nama_perkaderan' => 'required',
            'tahun' => 'required',
        ];

        $pesan = [
            'id_anggota.required' => 'Anggota wajib dipilih',
            'penyelenggara.required' => 'Penyelenggara wajib diisi',
            'nama_perkaderan.required' => 'Nama Sekolah wajib diisi',
            'tahun.required' => 'Tahun Masuk wajib diisi',
        ];

        $validated = $this->validate($rules, $pesan);
        ModelsPerkaderan::create($validated);

        // session()->flash('message', 'Data berhasil disimpan');
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil disimpan');

        $this->clear();
    }
    public function edit($id)
    {
        $data = ModelsPerkaderan::find($id);
        $this->id_anggota = $data->id_anggota;
        $this->penyelenggara = $data->penyelenggara;
        $this->nama_perkaderan = $data->nama_perkaderan;
        $this->tahun = $data->tahun;

        $this->updatedata = true;
        $this->perkaderan_id = $id;
    }

    public function update()
    {
        $rules = [
            'id_anggota' => 'required',
            'penyelenggara' => 'required',
            'nama_perkaderan' => 'required',
            'tahun' => 'required',
        ];

        $pesan = [
            'id_anggota.required' => 'Anggota wajib dipilih',
            'penyelenggara.required' => 'Penyelenggara wajib diisi',
            'nama_perkaderan.required' => 'Nama Sekolah wajib diisi',
            'tahun.required' => 'Tahun Masuk wajib diisi',
        ];

        $validated = $this->validate($rules, $pesan);
        $data = ModelsPerkaderan::find($this->perkaderan_id);
        $data->update($validated);

        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil diupdate');

        $this->clear();
    }

    public function delete_confirmation($id)
    {

        $this->perkaderan_id = $id;
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
        ModelsPerkaderan::destroy($this->perkaderan_id);
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
        $this->id_anggota = '';
        $this->penyelenggara = '';
        $this->nama_perkaderan = '';
        $this->tahun = '';
        $this->updatedata = false;
        $this->perkaderan_id = '';
    }

    public function generateYears()
    {
        $currentYear = date('Y');
        $years = [];
        for ($i = $currentYear; $i >= $currentYear - 32; $i--) {
            $years[] = $i;
        }
        return $years;
    }

    public function render()
    {
        $this->js(
            <<<'js'
            setTimeout(function(){
            $(".form-input-styled").uniform({
                fileButtonClass: "action btn bg-pink-400",
            });
             $(".daterange-single").daterangepicker();
            $(".file-input").fileinput();
            $(".form-control-select2").select2();
            },0);
            js
        );

        if ($this->search) {
            $this->resetPage();
        }
        return view('livewire.admin.perkaderan', [
            'dataperkaderan' => ModelsPerkaderan::where('id', 'like', '%' . $this->search . '%')
                ->orWhere('penyelenggara', 'like', '%' . $this->search . '%')
                ->orWhere('nama_perkaderan', 'like', '%' . $this->search . '%')
                ->orWhere('tahun', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'asc')
                ->paginate($this->paginate),
        ]);
    }
}
