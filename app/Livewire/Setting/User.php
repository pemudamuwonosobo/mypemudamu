<?php

namespace App\Livewire\Setting;

use App\Models\Cabang;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;

#[Title('Pengguna')]

class User extends Component
{
    use WithPagination;

    public $search = '';
    public $dataUsers;
    public $updatedata = false;
    public $user_id;
    public $paginate = 5;
    //form
    public $email;
    public $password;
    public $role_id;
    public $roles;
    public $cabang_id;
    public $cabangs;




    public function mount()
    {
        $this->roles = Role::all();
        $this->cabangs = Cabang::where('cabang_level', '1')->get();
    }
    public function store()
    {
        $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_id' => 'required',
        ];
        $pesan = [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Email tidak valid! Pastikan berbentuk email.',
            'email.unique' => 'Email telah digunakan!',
            'password.required' => 'Password wajib diisi!',
            'role_id.required' => 'Role wajib diisi!',
        ];

        // Validasi data
        $validated = $this->validate($rules, $pesan);

        // Hash password
        $validated['password'] = Hash::make($validated['password']);

        // Ambil cabang_id
        $cabang_id = $this->cabang_id;

        // Buat user baru
        ModelsUser::create([
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role_id' => $validated['role_id'],
            'cabang_id' => $cabang_id,
        ]);

        // Tampilkan notifikasi
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

        // Bersihkan form atau data
        $this->clear();
    }


    public function edit($id)
    {
        $data = ModelsUser::find($id);
        $this->email = $data->email;
        $this->role_id = $data->role_id;
        $this->cabang_id = $data->cabang_id; // Pastikan ini sesuai dengan kebutuhan
        $this->updatedata = true;
        $this->user_id = $id;
    }
    public function update()
    {
        $rules = [
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'password' => 'nullable',
            'role_id' => 'required',
        ];
        $pesan = [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Email tidak valid! Pastikan berbentuk email',
            'email.unique' => 'Email telah digunakan!',
            'password.required' => 'Password wajib diisi!',
            'role_id.required' => 'Role wajib diisi!',
        ];

        $validated = $this->validate($rules, $pesan);

        // Find the user by ID
        $user = ModelsUser::find($this->user_id);

        // Hash the password if it's provided
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // Remove password from the validated array if it's empty to prevent overwriting with null
            unset($validated['password']);
        }

        // Assuming cabang_id is available as a public property in the component
        $cabang_id = $this->cabang_id; // Adjust this based on how you get cabang_id

        // Update the user with validated data and cabang_id
        $user->update(array_merge($validated, ['cabang_id' => $cabang_id]));

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

        $this->clear();
    }


    public function delete_confirmation($id)
    {

        $this->user_id = $id;
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
        ModelsUser::destroy($this->user_id);
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
        $this->email = '';
        $this->password = '';
        $this->role_id = '';
        $this->cabang_id = '';
        $this->user_id = '';
    }

    public function render()
    {

        $this->js(
            <<<'js'
            setTimeout(function(){
            $(".form-input-styled").uniform({
                fileButtonClass: "action btn bg-pink-400",
            });
            $(".form-control-select2").select2();
            },0);
            js
        );

        if ($this->search) {
            $this->resetPage();
        }


        // $this->dataUsers = ModelsUser::orderBy('id', 'asc')->get();
        // return view('livewire.golongan-darah');
        return view('livewire.setting.user', [
            'users' => ModelsUser::where('email', 'like', '%' . $this->search . '%')->paginate($this->paginate),
        ]);
    }
}
