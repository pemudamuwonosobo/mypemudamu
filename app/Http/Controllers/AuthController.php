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
        // Validasi bahwa reCAPTCHA telah diisi
        if (!$request->has('g-recaptcha-response') || empty($request->input('g-recaptcha-response'))) {
            return redirect()->back()
                ->withErrors(['g-recaptcha-response' => 'Silakan pilih reCAPTCHA untuk melanjutkan.'])
                ->withInput(); // Membawa kembali input sebelumnya kecuali password
        }

        // Validasi data input, termasuk reCAPTCHA
        $request->validate([
            'email' => ['required', 'email'], // Mengharuskan username berupa email
            'password' => ['required'],
            'g-recaptcha-response' => ['required', 'recaptcha'], // Validasi reCAPTCHA
        ], [
            'g-recaptcha-response.required' => 'Silakan pilih reCAPTCHA untuk melanjutkan.', // Pesan error jika reCAPTCHA belum dipilih
        ]);

        // Membuat array $credentials hanya untuk email dan password
        $credentials = $request->only('email', 'password');

        // Mencoba untuk mengautentikasi pengguna
        if (Auth::attempt($credentials)) {
            // Regenerasi sesi untuk mencegah serangan fixation
            $request->session()->regenerate();

            // Mendapatkan pengguna yang telah diautentikasi
            $user = Auth::user();

            // Cek role dan log activity ke database berdasarkan role
            switch ($user->role_id) {
                case 1: // Superadmin
                    activity()->causedBy($user)
                        ->event('Login')->log('Superadmin melakukan login');
                    return redirect('dashboard');

                case 2: // Admin Daerah
                    activity()->causedBy($user)->event('Login')->log('Admin daerah melakukan login');
                    return redirect('dashboard');

                case 3: // Admin Cabang
                    $cabangNama = optional(auth()->user()->cabangs)->cabang_nm ?? 'tidak diketahui';
                    activity()->causedBy($user)->event('Login')->log('Admin PCPM ' . $cabangNama . ' melakukan login');
                    return redirect('dashboard');

                case 4: // User Cabang
                    $email = $user->email;
                    $anggota = Anggota::where('email', $email)->first();

                    if ($anggota && $anggota->akun == 1) {
                        Auth::logout();
                        return redirect('/login')->withErrors(['error' => 'Akun anda belum aktif. Silakan menghubungi admin cabang.']);
                    } else {
                        $userNama = $anggota->nama ?? 'tidak diketahui';
                        activity()->causedBy($user)->event('Login')->log('User ' . $userNama . ' melakukan login');
                        return redirect('client');
                    }


                default: // Jika role tidak sesuai
                    return redirect('default-route');
            }
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
