<?php

namespace App\Livewire\Admin;

use App\Models\Cabang;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;
use App\Models\Cabang as ModelsCabangRanting;

#[Title('Cabang-Ranting')]

class CabangRanting extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search = '';
    public $paginate = 10;
    public $cabangs;
    public $cabang_cd;
    public $cabang_nm;
    public $cabang_level;
    public $cabang_root;
    public $file;
    public $dataCabangRantings;
    public $updatedata = false;
    public $cabangranting_id;

    public function store()
    {
        $rules = [
            'cabang_cd' => 'required',
            'cabang_nm' => 'required',
            'cabang_level' => 'required',
            'cabang_root' => 'required_if:cabang_level,2', // Tambahan validasi jika level 2
        ];
        $pesan = [
            'cabang_cd.required' => 'Kode cabang wajib diisi',
            'cabang_nm.required' => 'Nama Cabang/Ranting wajib diisi',
            'cabang_level.required' => 'Level cabang wajib diisi',
            'cabang_root.required_if' => 'Root cabang wajib diisi untuk level 2',
        ];

        $validated = $this->validate($rules, $pesan);

        if ($this->file) {
            $namaCabang = $validated['cabang_nm'];
            $codeCabang = $validated['cabang_cd'];
            $fileName = $namaCabang . '_' . $codeCabang . '.' . $this->file->getClientOriginalExtension();

            // Simpan file
            $this->file->storeAs('public/files/SKCabangRanting', $fileName);
            $validated['file'] = 'files/SKCabangRanting/' . $fileName;
        } else {
            // Jika file tidak diupload, beri nilai null atau string kosong
            $validated['file'] = null;
        }

        // Simpan data ke database
        ModelsCabangRanting::create([
            'cabang_cd' => $validated['cabang_cd'],
            'cabang_nm' => $validated['cabang_nm'],
            'cabang_level' => $validated['cabang_level'],
            'cabang_root' => $this->cabang_root, // Pastikan $this->cabang_root sudah diisi sebelumnya jika level 2
            'file' => $validated['file'],
        ]);

        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil disimpan');

        $this->clear();
    }



    public function edit($id)
    {
        $data = ModelsCabangRanting::find($id);
        $this->cabang_nm = $data->cabang_nm;
        $this->cabang_cd = $data->cabang_cd;
        $this->cabang_level = $data->cabang_level;
        $this->cabang_root = $data->cabang_root;
        $this->file = $data->file;
        $this->updatedata = true;
        $this->cabangranting_id = $id;
    }

    public function update()
    {
        $rules = [
            'cabang_cd' => 'required',
            'cabang_nm' => 'required',
            'cabang_level' => 'required',
        ];
        $messages = [
            'cabang_cd.required' => 'Kode cabang wajib diisi',
            'cabang_nm.required' => 'Nama Cabang/Ranting wajib diisi',
            'cabang_level.required' => 'Level cabang wajib diisi',
        ];

        $validatedData = $this->validate($rules, $messages);

        // Temukan data cabang yang akan diupdate
        $data = ModelsCabangRanting::findOrFail($this->cabangranting_id);

        // Simpan referensi ke file lama jika ada
        $oldFile = $data->file;

        // Cek dan simpan file baru jika ada
        if ($this->file && is_object($this->file) && method_exists($this->file, 'getClientOriginalExtension')) {
            $namaCabang = $validatedData['cabang_nm'];
            $codeCabang = $validatedData['cabang_cd'];

            // Ambil semua file yang sudah ada di direktori
            $existingFiles = collect(Storage::files('public/files/SKCabangRanting'))
                ->filter(function ($file) use ($namaCabang, $codeCabang) {
                    return strpos($file, "{$namaCabang}_{$codeCabang}.update_") !== false;
                });

            // Tentukan nomor update terakhir
            $lastUpdateNumber = $existingFiles->map(function ($file) {
                preg_match('/update_(\d+)/', $file, $matches);
                return isset($matches[1]) ? (int)$matches[1] : 0;
            })->max();

            $ubahke = $lastUpdateNumber + 1;

            $fileName = $namaCabang . '_' . $codeCabang . '.update_' . $ubahke . '.' . $this->file->getClientOriginalExtension();

            // Simpan file baru
            $this->file->storeAs('public/files/SKCabangRanting', $fileName);
            $validatedData['file'] = 'files/SKCabangRanting/' . $fileName;

            // Hapus file lama jika ada
            if ($oldFile) {
                $oldFilePath = 'public/' . $oldFile; // Tambahkan 'public/' jika file path dari database relatif terhadap 'public'
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
        } else {
            // Jika tidak ada file baru, gunakan file lama
            $validatedData['file'] = $oldFile;
        }

        // Update data di database
        $data->update([
            'cabang_cd' => $validatedData['cabang_cd'],
            'cabang_nm' => $validatedData['cabang_nm'],
            'cabang_level' => $validatedData['cabang_level'],
            'cabang_root' => $this->cabang_root, // Pastikan $this->cabang_root sudah diisi sebelumnya jika level 2
            'file' => $validatedData['file'],
        ]);

        $this->dispatch('sweet-alert-save', icon: 'success', title: 'Data berhasil diupdate');
        $this->clear();
    }




    public function delete_confirmation($id)
    {

        $this->cabangranting_id = $id;
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
        ModelsCabangRanting::destroy($this->cabangranting_id);
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
        $this->cabang_nm = '';
        $this->cabang_cd = '';
        $this->cabang_root = '';
        // $this->cabang_level = '';
        $this->file = '';
        $this->updatedata = false;
        $this->cabangranting_id = '';
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

        $this->cabangs = Cabang::where('cabang_level', 1)->get();
        // $this->dataCabangRantings = ModelsCabangRanting::orderBy('cabang_cd', 'asc')->get();
        // return view('livewire.cabang-ranting', [
        //     'cabang_root' => Cabang::where('cabang_level', 1)->get()
        // ]);
        return view('livewire.admin.cabang-ranting', [
            'datacabangs' => ModelsCabangRanting::where(function ($query) {
                $query->where('cabang_nm', 'like', '%' . $this->search . '%')
                    ->orWhere('cabang_root', 'like', '%' . $this->search . '%');
            })
                ->orderBy('cabang_cd', 'asc')
                ->paginate($this->paginate)
        ]);
    }
}
