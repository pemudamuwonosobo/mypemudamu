<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cabang;
use App\Models\Profesi;
use App\Models\Pekerjaan;
use App\Models\GolonganDarah;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Anggota as ModelsAnggota;

#[Title('Anggota')]

class Anggota extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $cabangs;
    public $rantings;
    public $statAdd;
    public $level;
    public $listType = [];
    public $cabang_cd;
    public $cabang_root;
    public $gol_darahs;
    public $profesis;
    public $pekerjaans;
    public $years = [];
    public $updatedata = false;
    public $anggota_id;
    public $search = '';
    public $paginate = 10;
    public $preview = false;

    // form
    public $no_anggota;
    public $cabang;
    public $ranting;
    public $gelar_depan;
    public $gelar_belakang;
    public $nama;
    public $tempat_lahir;
    public $tgl_lahir;
    public $nik;
    public $email;
    public $no_telp;
    public $alamat;
    public $pendidikan_terakhir;
    public $gol_darah;
    public $is_nbm;
    public $no_nbm;
    public $is_ba;
    public $tahun_ba;
    public $status_kawin;
    public $profesi;
    public $profesi_lain;
    public $pekerjaan;
    public $tempat_kerja;
    public $status;
    public $foto;
    public $existingFoto;
    public $pertama;
    public $data;
    public $rules;
    public $dataclient;
    public $dataKosong = false;

    public function store()
    {

        $rules = [
            'cabang' => 'required',
            'ranting' => 'required',
            'gelar_depan' => 'nullable',
            'gelar_belakang' => 'nullable',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nik' => 'required',
            'email' => 'required|email|unique:anggotas,email',
            'no_telp' => 'required',
            'alamat' => 'required',
            'gol_darah' => 'required',
            'pendidikan_terakhir' => 'required',
            'is_nbm' => 'required',
            'no_nbm' => 'nullable',
            'is_ba' => 'required',
            'tahun_ba' => 'nullable',
            'status_kawin' => 'required',
            'profesi' => 'required',
            'profesi_lain' => 'nullable',
            'tempat_kerja' => 'nullable',
            'pekerjaan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $messages = [
            'cabang.required' => 'Cabang wajib diisi !',
            'ranting.required' => 'Ranting wajib diisi !',
            'nama.required' => 'Nama wajib diisi !',
            'tempat_lahir.required' => 'Tempat wajib diisi !',
            'tgl_lahir.required' => 'Tanggal wajib diisi !',
            'nik.required' => 'NIK wajib diisi !',
            'email.required' => 'E-mail wajib diisi !',
            'email.email' => 'E-mail tidak valid!',
            'email.unique' => 'E-mail sudah digugnakan silahkan ganti!',
            'no_telp.required' => 'No_Telp wajib diisi !',
            'alamat.required' => 'Alamat wajib diisi !',
            'gol_darah.required' => 'Golongan darah wajib diisi !',
            'pendidikan_terakhir.required' => 'Pendidikan terakhir wajib diisi !',
            'is_nbm.required' => 'Pertanyaan wajib dipilih !',
            'is_ba.required' => 'Pertanyaan wajib dipilih !',
            'status_kawin.required' => 'Pertanyaan wajib dipilih !',
            'profesi.required' => 'Profesi wajib diisi !',
            'pekerjaan.required' => 'Pekerjaan wajib diisi !',
            'foto.required' => 'Foto wajib diisi !',
            'foto.image' => 'Foto harus berupa gambar!',
            'foto.mimes' => 'Foto harus memiliki format: jpeg, png, jpg, gif, svg!',
            'foto.max' => 'Ukuran foto maksimal adalah 2MB!',
        ];
        // Validasi data
        $validatedData = $this->validate($rules, $messages);

        // Separate email and no_telp
        $email = $validatedData['email'];
        $no_telp = $validatedData['no_telp'];


        // Tambahkan no_anggota
        $validatedData['no_anggota'] = get_code($this->cabang);

        // Cek dan simpan foto jika ada
        if ($this->foto) {
            $namaOrang = $validatedData['nama'];
            $kta = $validatedData['no_anggota'];
            $fotoName = $namaOrang . '_' . $kta . '.' . $this->foto->getClientOriginalExtension();

            // Simpan file foto
            $this->foto->storeAs('public/images/fotoanggota', $fotoName);
            $validatedData['foto'] = 'images/fotoanggota/' . $fotoName;
        } else {
            session()->flash('error', 'File foto tidak ditemukan.');
            return;
        }

        // Hash the password
        $password = Hash::make($no_telp);

        // Simpan data ke database
        try {
            // Simpan anggota
            $anggota = ModelsAnggota::create($validatedData);

            // Simpan ke tabel users
            User::create([
                'email' => $email,
                'password' => $password,
                'role_id' => 4
            ]);

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
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menyimpan data anggota: ' . $e->getMessage());
        }
        $this->statAdd = false;
        $this->clear();
    }
    public function edit($id)
    {
        $this->statAdd = true;
        $data = ModelsAnggota::findOrFail($id);
        $this->cabang = $data->cabang;
        $this->listType = Cabang::where('cabang_root', $data->cabang)->get();
        $this->ranting = $data->ranting;
        $this->gelar_depan = $data->gelar_depan;
        $this->gelar_belakang = $data->gelar_belakang;
        $this->nama = $data->nama;
        $this->tempat_lahir = $data->tempat_lahir;
        $this->tgl_lahir = $data->tgl_lahir;
        $this->nik = $data->nik;
        $this->email = $data->email;
        $this->no_telp = $data->no_telp;
        $this->alamat = $data->alamat;
        $this->pendidikan_terakhir = $data->pendidikan_terakhir;
        $this->gol_darah = $data->gol_darah;
        $this->is_nbm = $data->is_nbm;
        $this->no_nbm = $data->no_nbm;
        $this->is_ba = $data->is_ba;
        $this->tahun_ba = $data->tahun_ba;
        $this->status_kawin = $data->status_kawin;
        $this->profesi = $data->profesi;
        $this->profesi_lain = $data->profesi_lain;
        $this->pekerjaan = $data->pekerjaan;
        $this->tempat_kerja = $data->tempat_kerja;
        $this->status = $data->status;
        $this->foto = $data->foto;
        $this->updatedata = true;
        $this->anggota_id = $id;
    }

    public function cek($id)
    {
        $dataclient = ModelsAnggota::findOrFail($id);

        $this->preview = true;
        $this->cabang = $dataclient->Cabang->cabang_nm;
        $this->listType = Cabang::where('cabang_root', $dataclient->cabang)->get();
        $this->ranting = $dataclient->Ranting->cabang_nm;
        $this->gelar_depan = $dataclient->gelar_depan;
        $this->gelar_belakang = $dataclient->gelar_belakang;
        $this->nama = $dataclient->nama;
        $this->no_anggota = $dataclient->no_anggota;
        $this->tempat_lahir = $dataclient->tempat_lahir;
        $this->tgl_lahir = $dataclient->tgl_lahir;
        $this->nik = $dataclient->nik;
        $this->email = $dataclient->email;
        $this->no_telp = $dataclient->no_telp;
        $this->alamat = $dataclient->alamat;
        $this->pendidikan_terakhir = $dataclient->pendidikan_terakhir;
        $this->gol_darah = $dataclient->GolDarah->nama;
        $this->is_nbm = $dataclient->is_nbm;
        $this->no_nbm = $dataclient->no_nbm;
        $this->is_ba = $dataclient->is_ba;
        $this->tahun_ba = $dataclient->tahun_ba;
        $this->status_kawin = $dataclient->status_kawin;
        $this->profesi = $dataclient->Profesi->nama;
        $this->profesi_lain = $dataclient->profesi_lain;
        $this->pekerjaan = $dataclient->Pekerjaan->nama;
        $this->tempat_kerja = $dataclient->tempat_kerja;
        $this->status = $dataclient->status;
        $this->foto = $dataclient->foto;
        $this->anggota_id = $id;
    }

    public function closepreview()
    {
        $this->preview = false;
    }

    public function validasi_draft_to_validasi($id)
    {
        $anggota = ModelsAnggota::find($id);
        if ($anggota && $anggota->status == 'Draft') {
            $anggota->status = 'Validasi';
            $anggota->save();

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
            title: "Data Tervalidasi"
            });
        JS);
        } else {
            session()->flash('error', 'Anggota tidak ditemukan atau sudah diverifikasi.');
        }
    }

    public function validasi_validasi_to_draft($id)
    {
        $anggota = ModelsAnggota::find($id);
        if ($anggota && $anggota->status == 'Validasi') {
            $anggota->status = 'Draft';
            $anggota->save();

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
            title: "Data kembali ke Draft"
            });
        JS);
        } else {
            session()->flash('error', 'Anggota tidak ditemukan atau sudah diverifikasi.');
        }
    }

    public function validasi_validasi_to_verifikasi($id)
    {
        $anggota = ModelsAnggota::find($id);
        if ($anggota && $anggota->status == 'Validasi') {
            $anggota->status = 'Terverifikasi';
            $anggota->save();

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
            title: "Data Terferifikasi"
            });
        JS);
        } else {
            session()->flash('error', 'Anggota tidak ditemukan atau sudah diverifikasi.');
        }
    }

    public function validasi_verifikasi_to_validasi($id)
    {
        $anggota = ModelsAnggota::find($id);
        if ($anggota && $anggota->status == 'Terverifikasi') {
            $anggota->status = 'Validasi';
            $anggota->save();

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
            title: "Data kembali ke Validasi"
            });
        JS);
        } else {
            session()->flash('error', 'Anggota tidak ditemukan atau sudah diverifikasi.');
        }
    }

    public function updateForm()
    {
        $rules = [
            'cabang' => 'required',
            'ranting' => 'required',
            'gelar_depan' => 'nullable',
            'gelar_belakang' => 'nullable',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nik' => 'required',
            'email' => 'required|email|unique:anggotas,email,' . $this->anggota_id,
            'no_telp' => 'required',
            'alamat' => 'required',
            'pendidikan_terakhir' => 'required',
            'gol_darah' => 'required',
            'is_nbm' => 'required',
            'no_nbm' => 'nullable',
            'is_ba' => 'required',
            'tahun_ba' => 'nullable',
            'status_kawin' => 'required',
            'profesi' => 'required',
            'profesi_lain' => 'nullable',
            'tempat_kerja' => 'nullable',
            'pekerjaan' => 'required',
        ];

        $messages = [
            'cabang.required' => 'Cabang wajib diisi!',
            'ranting.required' => 'Ranting wajib diisi!',
            'nama.required' => 'Nama wajib diisi!',
            'tempat_lahir.required' => 'Tempat wajib diisi!',
            'tgl_lahir.required' => 'Tanggal wajib diisi!',
            'nik.required' => 'NIK wajib diisi!',
            'email.required' => 'E-mail wajib diisi!',
            'email.email' => 'E-mail tidak valid!',
            'email.unique' => 'E-mail sudah digunakan, silahkan ganti!',
            'no_telp.required' => 'No. Telp wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'pendidikan_terakhir.required' => 'Pendidikan terakhir wajib diisi!',
            'gol_darah.required' => 'Golongan darah wajib diisi!',
            'is_nbm.required' => 'Pertanyaan wajib dipilih!',
            'is_ba.required' => 'Pertanyaan wajib dipilih!',
            'status_kawin.required' => 'Status kawin wajib dipilih!',
            'profesi.required' => 'Profesi wajib diisi!',
            'pekerjaan.required' => 'Pekerjaan wajib diisi!',
        ];

        // Validasi data
        $validatedData = $this->validate($rules, $messages);

        // Temukan data anggota yang akan diupdate
        $data = ModelsAnggota::findOrFail($this->anggota_id);

        // Simpan referensi ke foto lama jika ada
        $oldFoto = $data->foto;

        // Cek dan simpan foto baru jika ada
        if ($this->foto && is_object($this->foto) && method_exists($this->foto, 'getClientOriginalExtension')) {
            $namaOrang = $this->nama;
            $kta = $data->no_anggota;

            // Ambil semua file yang sudah ada di direktori
            $existingFiles = collect(Storage::files('public/images/fotoanggota'))
                ->filter(function ($file) use ($namaOrang, $kta) {
                    return strpos($file, "{$namaOrang}_{$kta}.update_") !== false;
                });

            // Tentukan nomor update terakhir
            $lastUpdateNumber = $existingFiles->map(function ($file) {
                preg_match('/update_(\d+)/', $file, $matches);
                return isset($matches[1]) ? (int)$matches[1] : 0;
            })->max();

            $ubahke = $lastUpdateNumber + 1;

            $fotoName = $namaOrang . '_' . $kta . '.update_' . $ubahke . '.' . $this->foto->getClientOriginalExtension();

            // Simpan file foto baru
            $this->foto->storeAs('public/images/fotoanggota', $fotoName);
            $validatedData['foto'] = 'images/fotoanggota/' . $fotoName;
        } else {
            // Jika tidak ada foto baru, gunakan foto lama
            $validatedData['foto'] = $oldFoto;
        }

        // Update data anggota
        try {
            $data->update($validatedData);

            // Hapus foto lama jika ada dan jika foto baru berhasil disimpan
            if ($oldFoto && isset($validatedData['foto']) && $validatedData['foto'] !== $oldFoto && Storage::exists('public/' . $oldFoto)) {
                Storage::delete('public/' . $oldFoto);
            }

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
                title: "Data berhasil diupdate"
            });
    JS);
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal mengupdate data anggota: ' . $e->getMessage());
        }

        $this->reset('foto');
        $this->statAdd = false;
        $this->updatedata = false;
        $this->clear();
    }




    public function back_store()
    {
        $this->statAdd = false;
        $this->updatedata = false;
        $this->clear();
    }


    public function mount()
    {
        $this->cabangs = Cabang::whereNull('cabang_root')->get();
        $this->gol_darahs = GolonganDarah::all();
        $this->profesis = Profesi::all();
        $this->pekerjaans = Pekerjaan::all();
        $this->years = $this->generateYears();
    }

    public function akun_change($id)
    {
        $anggota = ModelsAnggota::find($id);
        if ($anggota) {
            $anggota->akun = $anggota->akun == 2 ? 1 : 2;
            $anggota->save();

            $this->dispatch('sweet-alert-save', icon: 'success', title: 'Akun berhasil dirubah');
        }
    }

    public function updatedCabang($value)
    {
        $this->updateListType($value);
    }

    public function updateListType($cabang_cd)
    {
        $this->listType = Cabang::where('cabang_root', $cabang_cd)->get();

        // $this->ranting = null;
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

    public function clear()
    {
        $this->cabang = '';
        $this->ranting = '';
        $this->gelar_depan = '';
        $this->gelar_belakang = '';
        $this->nama = '';
        $this->tempat_lahir = '';
        $this->tgl_lahir = '';
        $this->nik = '';
        $this->email = '';
        $this->no_telp = '';
        $this->alamat = '';
        $this->pendidikan_terakhir = '';
        $this->gol_darah = '';
        $this->is_nbm = '';
        $this->no_nbm = '';
        $this->is_ba = '';
        $this->tahun_ba = '';
        $this->status_kawin = '';
        $this->profesi = '';
        $this->profesi_lain = '';
        $this->pekerjaan = '';
        $this->tempat_kerja = '';
        $this->status = '';
        $this->foto = '';
        $this->existingFoto  = null;
    }

    public function delete_confirmation($id)
    {

        $this->anggota_id = $id;
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
    public function tambah()
    {
        $this->statAdd = true;
        $this->updatedata = false;
        $this->clear();
    }
    public function closeform()
    {
        $this->statAdd = false;
        $this->clear();
    }

    public function delete()
    {
        ModelsAnggota::destroy($this->anggota_id);
        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil dihapus');
        $this->clear();
    }
    public function render()
    {
        $akun = User::with('cabangs')->find(auth()->user()->id);

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

        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $a = ModelsAnggota::where(function ($query) {
                $query->where('no_anggota', 'like', '%' . $this->search . '%')
                    ->orWhere('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('cabang', 'like', '%' . $this->search . '%')
                    ->orWhere('status', 'like', '%' . $this->search . '%');
            })
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);
            $this->dataKosong = $a->isEmpty();
        } elseif (auth()->user()->role_id == 3) {
            $a = ModelsAnggota::where(function ($query) {
                $query->where('no_anggota', 'like', '%' . $this->search . '%')
                    ->orWhere('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('cabang', 'like', '%' . $this->search . '%')
                    ->orWhere('status', 'like', '%' . $this->search . '%');
            })
                ->where('cabang', $akun->cabangs['cabang_cd'] ?? null) // Pastikan kondisi ini benar
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);

            $this->dataKosong = $a->isEmpty();
        }

        return view('livewire.admin.anggota', [
            'cabangs' => $this->cabangs,
            'listType' => $this->listType,
            'dataanggota' => $a,
        ]);
    }
}
