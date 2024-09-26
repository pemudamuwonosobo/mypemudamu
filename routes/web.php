<?php

use App\Livewire\Admin\Report;
use App\Livewire\Setting\Role;
use App\Livewire\Setting\User;
use App\Livewire\Admin\Anggota;
use App\Livewire\Client\Client;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Setting\Profesi;
use App\Livewire\Admin\Organisasi;
use App\Livewire\Admin\Pendidikan;
use App\Livewire\Admin\Perkaderan;
use App\Livewire\Setting\Pekerjaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Livewire\Admin\CabangRanting;
use Illuminate\Support\Facades\Route;
use App\Livewire\Setting\GolonganDarah;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Livewire\Client\OrganisasiClient;
use App\Livewire\Client\PendidikanClient;
use App\Livewire\Client\PerkaderanClient;
use App\Http\Controllers\IdcardController;
use App\Http\Controllers\RegistrasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
Route::get('template', function () {
    return file::get(public_path() . '/documentation.html');
});



Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    //Admin
    Route::get('/dashboard', Dashboard::class)->middleware('only_operator');
    Route::get('/pendidikan', Pendidikan::class)->middleware('only_admin');
    Route::get('/perkaderan', Perkaderan::class)->middleware('only_admin');
    Route::get('/organisasi', Organisasi::class)->middleware('only_admin');
    Route::get('/cabang_ranting', CabangRanting::class)->middleware('only_admin');
    Route::get('/anggota', Anggota::class)->middleware('only_operator');
    Route::get('/gol_darah', GolonganDarah::class)->middleware('only_admin');
    Route::get('/profesi', Profesi::class)->middleware('only_admin');
    Route::get('/pekerjaan', Pekerjaan::class)->middleware('only_admin');
    Route::get('/role', Role::class)->middleware('only_admin');
    Route::get('/user', User::class)->middleware('only_admin');
    Route::get('/report', Report::class)->middleware('only_operator');

    //client
    Route::get('/client', Client::class)->middleware('only_client');
    Route::get('/client-pendidikan', PendidikanClient::class)->middleware('only_client');
    Route::get('/client-organisasi', OrganisasiClient::class)->middleware('only_client');
    Route::get('/client-perkaderan', PerkaderanClient::class)->middleware('only_client');
    Route::get('/form', [Client::class, 'create'])->name('form.create')->middleware('only_client');

    //id-card
    Route::get('idcard', [IdcardController::class, 'index'])->name('idcard'); //print
    Route::get('id-card', [IDCardController::class, 'show'])->name('id.card.show'); //download



    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});




Route::middleware('only_guest')->group(function () {
    //Route Registrasi Anggota
    Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
    Route::post('/registrasi/store', [RegistrasiController::class, 'store'])->name('registrasi.store');
    Route::post('getRanting', [RegistrasiController::class, 'getRanting'])->name('getRanting');
    Route::post('form', [RegistrasiController::class, 'store'])->name('form.store');

    //Route Autenticating
    Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('only_guest');
    Route::post('login', [AuthController::class, 'authenticating'])->middleware('only_guest');
});
