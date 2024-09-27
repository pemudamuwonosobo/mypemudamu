<?php

namespace App\Livewire\Setting;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('Ubah-Password')]

class ChangePassword extends Component
{
    public $new_password;
    public $new_password_confirmation;

    protected $rules = [
        'new_password' => 'required|min:8|confirmed',
    ];

    protected $messages = [
        'new_password.required' => 'Password baru wajib diisi!',
        'new_password.min' => 'Password minimal harus 8 karakter!',
        'new_password.confirmed' => 'Konfirmasi password tidak cocok!',
    ];

    public function changePassword()
    {
        $this->validate();

        // Update password user yang sedang login
        $user = User::find(Auth::id());
        $user->password = Hash::make($this->new_password);
        $user->save();

        // Kirim pesan berhasil
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
                title: "Password berhasil diubah"
            });
        JS);

        // Clear input fields
        $this->new_password = '';
        $this->new_password_confirmation = '';

        // Logout user setelah berhasil ubah password
        Auth::logout();

        // Redirect ke halaman login setelah logout
        return redirect()->route('login');
    }



    public function render()
    {
        return view('livewire.setting.change-password');
    }
}
