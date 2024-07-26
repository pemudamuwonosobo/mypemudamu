<?php

namespace App\Livewire\Admin;

use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use App\Models\Organisasi as ModelsOrganisasi;

#[Title('Organisasi')]

class Organisasi extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search = '';
    public $paginate = 10;
    public $id_anggota;
    public $organisasi_type;
    public $nama_organisasi;
    public $tingkat;
    public $periode_awal;
    public $periode_akhir;
    public $dataOrganisasis;
    public $updatedata = false;
    public $Organisasi_id;
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
            'organisasi_type' => 'required',
            'nama_organisasi' => 'required',
            'periode_awal' => 'required',
            'periode_akhir' => 'required',
            'tingkat' => '',
        ];

        $pesan = [
            'id_anggota.required' => 'Anggota wajib dipilih',
            'organisasi_type.required' => 'Wajib dipilih',
            'nama_organisasi.required' => 'Nama Sekolah wajib diisi',
            'periode_awal.required' => 'Tahun Masuk wajib diisi',
            'periode_akhir.required' => 'Tahun Lulus wajib diisi',
        ];

        $validated = $this->validate($rules, $pesan);
        ModelsOrganisasi::create($validated);

        // session()->flash('message', 'Data berhasil disimpan');
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil disimpan');

        $this->clear();
    }
    public function edit($id)
    {
        $data = ModelsOrganisasi::find($id);
        $this->id_anggota = $data->id_anggota;
        $this->tingkat = $data->tingkat;
        $this->nama_organisasi = $data->nama_organisasi;
        $this->periode_awal = $data->periode_awal;
        $this->periode_akhir = $data->periode_akhir;
        $this->organisasi_type = $data->organisasi_type;

        $this->updatedata = true;
        $this->Organisasi_id = $id;
    }

    public function update()
    {
        $rules = [
            'id_anggota' => 'required',
            'organisasi_type' => 'required',
            'nama_organisasi' => 'required',
            'periode_awal' => 'required',
            'periode_akhir' => 'required',
            'tingkat' => '',
        ];

        $pesan = [
            'id_anggota.required' => 'Anggota wajib dipilih',
            'organisasi_type.required' => 'Wajib dipilih',
            'nama_organisasi.required' => 'Nama Sekolah wajib diisi',
            'periode_awal.required' => 'Tahun Masuk wajib diisi',
            'periode_akhir.required' => 'Tahun Lulus wajib diisi',
        ];

        $validated = $this->validate($rules, $pesan);
        $data = ModelsOrganisasi::find($this->Organisasi_id);
        $data->update($validated);

        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil diupdate');

        $this->clear();
    }

    public function delete_confirmation($id)
    {

        $this->Organisasi_id = $id;
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
        ModelsOrganisasi::destroy($this->Organisasi_id);
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
        $this->organisasi_type = '';
        $this->tingkat = '';
        $this->nama_organisasi = '';
        $this->periode_awal = '';
        $this->periode_akhir = '';
        $this->updatedata = false;
        $this->Organisasi_id = '';
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
        return view('livewire.admin.organisasi', [
            'dataOrganisasi' => ModelsOrganisasi::where('id', 'like', '%' . $this->search . '%')
                ->orWhere('tingkat', 'like', '%' . $this->search . '%')
                ->orWhere('nama_organisasi', 'like', '%' . $this->search . '%')
                ->orWhere('periode_awal', 'like', '%' . $this->search . '%')
                ->orWhere('periode_akhir', 'like', '%' . $this->search . '%')
                ->orWhere('organisasi_type', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'asc')
                ->paginate($this->paginate),
        ]);
    }
}
