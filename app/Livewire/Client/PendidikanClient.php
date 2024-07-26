<?php

namespace App\Livewire\Client;

use App\Models\User;
use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendidikan as ModelsPendidikan;

class PendidikanClient extends Component

{
    use WithFileUploads;
    use WithPagination;
    public $search = '';
    public $paginate = 10;
    public $id_anggota;
    public $nama_sekolah;
    public $tingkat;
    public $tahun_masuk;
    public $tahun_lulus;
    public $dataPendidikans;
    public $updatedata = false;
    public $Pendidikan_id;
    public $years = [];
    public $anggotas;
    public $user;
    public $statAdd = false;


    public function mount()
    {
        $this->anggotas =  Anggota::where('email', Auth::user()->email)->first();
        $this->years = $this->generateYears();
        $this->user = Auth::user();
    }
    public function store()
    {
        $rules = [
            'tingkat' => 'required',
            'nama_sekolah' => 'required',
            'tahun_masuk' => 'required',
            'tahun_lulus' => 'required',
        ];
        $pesan = [
            'tingkat.required' => 'Tingkat wajib diisi',
            'nama_sekolah.required' => 'Nama Sekolah wajib diisi',
            'tahun_masuk.required' => 'Tahun Masuk wajib diisi',
            'tahun_lulus.required' => 'Tahun Lulus wajib diisi',
        ];
        $validated = $this->validate($rules, $pesan);
        $user_login = Anggota::where('email', Auth::user()->email)->first();
        $id = $user_login->id;
        $validated['id_anggota'] = $id;
        ModelsPendidikan::create($validated);
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil disimpan');
        $this->clear();
    }

    public function edit($id)
    {
        $data = ModelsPendidikan::find($id);
        $this->id_anggota = $data->id_anggota;
        $this->tingkat = $data->tingkat;
        $this->nama_sekolah = $data->nama_sekolah;
        $this->tahun_masuk = $data->tahun_masuk;
        $this->tahun_lulus = $data->tahun_lulus;
        $this->statAdd = true;
        $this->updatedata = true;
        $this->Pendidikan_id = $id;
    }

    public function update()
    {
        $rules = [
            'tingkat' => 'required',
            'nama_sekolah' => 'required',
            'tahun_masuk' => 'required',
            'tahun_lulus' => 'required',
        ];
        $pesan = [
            'tingkat.required' => 'Tingkat wajib diisi',
            'nama_sekolah.required' => 'Nama Sekolah wajib diisi',
            'tahun_masuk.required' => 'Tahun Masuk wajib diisi',
            'tahun_lulus.required' => 'Tahun Lulus wajib diisi',
        ];
        $validated = $this->validate($rules, $pesan);
        $data = ModelsPendidikan::find($this->Pendidikan_id);
        $data->update($validated);
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil diupdate');
        $this->clear();
    }

    public function delete_confirmation($id)
    {
        $this->Pendidikan_id = $id;
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
        ModelsPendidikan::destroy($this->Pendidikan_id);
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
        $this->tingkat = '';
        $this->nama_sekolah = '';
        $this->tahun_masuk = '';
        $this->tahun_lulus = '';
        $this->updatedata = false;
        $this->Pendidikan_id = '';
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

        $datapendidikan = ModelsPendidikan::where('id_anggota', $id)
            ->where(function ($query) {
                $query->where('id', 'like', '%' . $this->search . '%')
                    ->orWhere('tingkat', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_sekolah', 'like', '%' . $this->search . '%')
                    ->orWhere('tahun_masuk', 'like', '%' . $this->search . '%')
                    ->orWhere('tahun_lulus', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->paginate);

        return view('livewire.client.pendidikan-client', [
            'datapendidikan' => $datapendidikan,
        ]);
    }
}
