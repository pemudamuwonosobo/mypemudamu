<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }




    public function authenticating(Request $request)
    {
        // dd('ini halaman authenticating');
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // Session::flash('status', 'failed');
            // Session::flash('message', 'Akun tidak ditemukan');

            // $request->session()->regenerate();
            if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 4) {
                return redirect('client');
            }

            // dd(Auth::user());
            // $request->session()->regenerate();
            // return redirect();
        }
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
