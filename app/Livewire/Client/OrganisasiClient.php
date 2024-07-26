<?php

namespace App\Livewire\Client;

use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisasi as ModelsOrganisasi;

#[Title('Organisasi')]

class OrganisasiClient extends Component
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
    public $dataorganisasis;
    public $updatedata = false;
    public $Organisasi_id;
    public $years = [];
    public $anggotas;
    public $statAdd = false;

    public $datapendidikan;


    public function mount()
    {
        $this->anggotas = Anggota::all();
        $this->years = $this->generateYears();
    }
    public function store()
    {
        $rules = [
            'organisasi_type' => 'required',
            'nama_organisasi' => 'required',
            'periode_awal' => 'required',
            'periode_akhir' => 'required',
            'tingkat' => '',
        ];

        $pesan = [
            'organisasi_type.required' => 'Wajib dipilih',
            'nama_organisasi.required' => 'Nama Sekolah wajib diisi',
            'periode_awal.required' => 'Tahun Masuk wajib diisi',
            'periode_akhir.required' => 'Tahun Lulus wajib diisi',
        ];

        $validated = $this->validate($rules, $pesan);
        $user_login = Anggota::where('email', Auth::user()->email)->first();
        $id = $user_login->id;
        $validated['id_anggota'] = $id;
        ModelsOrganisasi::create($validated);
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
        $this->statAdd = true;
        $this->updatedata = true;
        $this->Organisasi_id = $id;
    }

    public function update()
    {
        $rules = [
            'organisasi_type' => 'required',
            'nama_organisasi' => 'required',
            'periode_awal' => 'required',
            'periode_akhir' => 'required',
            'tingkat' => '',
        ];

        $pesan = [
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
    public function tambah()
    {
        $this->statAdd = true;
    }

    public function back_store()
    {
        $this->statAdd = false;
        $this->updatedata = false;
        $this->clear();
    }

    public function closeform()
    {
        $this->statAdd = false;
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

        $user_login = Anggota::where('email', Auth::user()->email)->first();
        $id = $user_login->id;

        if ($this->search) {
            $this->resetPage();
        }
        $dataorganisasi = ModelsOrganisasi::where('id_anggota', $id)
            ->where(function ($query) {
                $query->where('id', 'like', '%' . $this->search . '%')
                    ->orWhere('tingkat', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_organisasi', 'like', '%' . $this->search . '%')
                    ->orWhere('periode_awal', 'like', '%' . $this->search . '%')
                    ->orWhere('periode_akhir', 'like', '%' . $this->search . '%')
                    ->orWhere('organisasi_type', 'like', '%' . $this->search . '%');
            })
            ->orderByRaw("FIELD(tingkat, 'SD', 'MI', 'SMP', 'MTs', 'SMA', 'MA', 'SMK', 'S1', 'S2', 'S3')")
            ->paginate($this->paginate);
        return view('livewire.client.organisasi-client', [
            'dataorganisasi' => $dataorganisasi,
        ]);
    }
}
