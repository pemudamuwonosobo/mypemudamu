<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('client.register-add');
    }

    public function authenticating(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => ['required', 'email'], // Mengharuskan username berupa email
            'password' => ['required'],
        ]);

        // Mencoba untuk mengautentikasi pengguna
        if (Auth::attempt($credentials)) {
            // Regenerasi sesi untuk mencegah serangan fixation
            $request->session()->regenerate();

            // Mendapatkan pengguna yang telah diautentikasi
            $user = Auth::user();

            // dd($user);
            // Memeriksa role dan mengarahkan ke halaman yang sesuai
            if (Auth::user()->role_id !== 4) {
                return redirect('dashboard');
            }

            if (Auth::check() && Auth::user()->role_id == 4) {
                $email = Auth::user()->email;
                $anggota = Anggota::where('email', $email)->first();

                if ($anggota && $anggota->akun == 1) {
                    Auth::logout();
                    return redirect('/login')->withErrors(['error' => 'Akun anda belum aktif. Silakan menghubungi admin cabang.']);
                } else {
                    return redirect('client');
                }
            }


            // Arahkan ke halaman default jika role tidak cocok
            return redirect('default-route');
        }




        // Jika autentikasi gagal, beri pesan error dan arahkan kembali ke halaman login
        Session::flash('status', 'failed');
        Session::flash('message', 'Akun tidak ditemukan');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
