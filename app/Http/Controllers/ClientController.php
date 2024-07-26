<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnggotaRequest;
use App\Models\Anggota;
use App\Models\Cabang;
use App\Models\GolonganDarah;
use App\Models\Pekerjaan;
use App\Models\Profesi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function index()
    {
        $currentYear = date('Y');
        $years = [];
        for ($i = $currentYear; $i >= $currentYear - 32; $i--) {
            $years[] = $i;
        }

        $anggotas = Anggota::all();
        $pekerjaans = Pekerjaan::all();
        $profesis = Profesi::all();
        $golongandarahs = GolonganDarah::all();
        $cabangs = Cabang::whereNull('cabang_root')->get();
        return view('registrasi', compact('anggotas', 'cabangs', 'pekerjaans', 'profesis', 'golongandarahs', 'years'));
    }

    public function getRanting(request $request)
    {
        $id_cabang = $request->id_cabang;

        $state = Cabang::where('cabang_root', $id_cabang)->get()->pluck('cabang_nm', 'cabang_cd');
        // return $state;

        return response()->json($state);
    }

    public function store(StoreAnggotaRequest $request)
    {
        $validatedData = $request->validated();
        try {
            // Separate email and no_telp
            $email = $validatedData['email'];
            $no_telp = $validatedData['no_telp'];

            // Tambahkan no_anggota
            $validatedData['no_anggota'] = get_code($validatedData['cabang']);

            // Cek dan simpan foto jika ada
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                $namaOrang = $validatedData['nama'];
                $kta = $validatedData['no_anggota'];
                $fotoName = $namaOrang . '_' . $kta . '.' . $request->foto->getClientOriginalExtension();

                // Simpan file foto
                $path = $request->foto->storeAs('public/images/fotoanggota', $fotoName);
                Log::info('File stored at: ' . $path);
                $validatedData['foto'] = 'images/fotoanggota/' . $fotoName;
            } else {
                return redirect()->back()->with('error', 'File foto tidak ditemukan atau tidak valid.');
            }

            // Hash the password
            $password = Hash::make($no_telp);

            // Simpan data ke database
            // Simpan anggota
            Anggota::create($validatedData);

            // Simpan ke tabel users
            User::create([
                'email' => $email,
                'password' => $password,
                'role_id' => 4
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan.');
            // return redirect('login');
        } catch (Exception $error) {
            return $error;
        }
    }
}
