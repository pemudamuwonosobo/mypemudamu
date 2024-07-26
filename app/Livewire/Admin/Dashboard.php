<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Cabang;
use App\Models\Anggota;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

#[Title('Dashboard')]

class Dashboard extends Component
{
    public $anggotas;
    public $jumlahAnggota;
    public $draftAnggota;
    public $validasiAnggota;
    public $verifikasiAnggota;
    public $cabangData;
    public $totals;
    public $cabangList;
    public $rantingList;
    public $selectedCabang;
    public $cabangs;
    public $jumlahCabang;
    public $jumlahRanting;
    public function mount()
    {


        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $this->anggotas = Anggota::all();
            $this->jumlahAnggota = Anggota::count();
            $this->draftAnggota = Anggota::where('status', 'Draft')->count();
            $this->validasiAnggota = Anggota::where('status', 'Validasi')->count();
            $this->verifikasiAnggota = Anggota::where('status', 'Terverifikasi')->count();
            $this->jumlahCabang = Cabang::where('cabang_level', 1)->count();
            $this->jumlahRanting = Cabang::where('cabang_level', 2)->count();

            $this->cabangData = Cabang::leftJoin('anggotas', 'cabangs.cabang_cd', '=', 'anggotas.cabang')
                ->select(
                    'cabangs.cabang_cd as cabang_cd',
                    'cabangs.cabang_nm as cabang_nm',
                    DB::raw('COUNT(CASE WHEN anggotas.status = "draft" THEN 1 END) as draft_count'),
                    DB::raw('COUNT(CASE WHEN anggotas.status = "validasi" THEN 1 END) as validasi_count'),
                    DB::raw('COUNT(CASE WHEN anggotas.status = "terverifikasi" THEN 1 END) as verifikasi_count'),
                    DB::raw('COUNT(anggotas.id) as total_count')
                )
                ->where('cabangs.cabang_level', 1)
                ->groupBy('cabangs.cabang_cd', 'cabangs.cabang_nm')
                ->get();

            $this->totals = [
                'draft' => $this->cabangData->sum('draft_count'),
                'validasi' => $this->cabangData->sum('validasi_count'),
                'terverifikasi' => $this->cabangData->sum('verifikasi_count'),
                'total' => $this->cabangData->sum('total_count'),
            ];

            $this->cabangList = Cabang::where('cabang_level', 1)->get();
            $this->rantingList = collect();
        } elseif (auth()->user()->role_id == 3) {
            $akun = User::with('cabangs')->find(auth()->user()->id);

            // Ambil data anggota berdasarkan cabang dari akun
            $cabangCd = optional($akun->cabangs)->cabang_cd ?? null;

            $this->anggotas = Anggota::where('cabang', $cabangCd)->get();

            $this->jumlahAnggota = Anggota::where('cabang', $cabangCd)->count();
            $this->draftAnggota = Anggota::where('status', 'Draft')->where('cabang', $cabangCd)->count();
            $this->validasiAnggota = Anggota::where('status', 'Validasi')->where('cabang', $cabangCd)->count();
            $this->verifikasiAnggota = Anggota::where('status', 'Terverifikasi')->where('cabang', $cabangCd)->count();

            // Ambil data cabang dan hitung jumlah anggota berdasarkan status
            $this->cabangData = Cabang::leftJoin('anggotas', 'cabangs.cabang_cd', '=', 'anggotas.ranting')
                ->select(
                    'cabangs.cabang_cd as cabang_cd',
                    'cabangs.cabang_nm as cabang_nm',
                    DB::raw('COUNT(anggotas.id) as total_count'),
                    DB::raw('SUM(CASE WHEN anggotas.status = "Draft" THEN 1 ELSE 0 END) as draft_count'),
                    DB::raw('SUM(CASE WHEN anggotas.status = "Validasi" THEN 1 ELSE 0 END) as validasi_count'),
                    DB::raw('SUM(CASE WHEN anggotas.status = "Terverifikasi" THEN 1 ELSE 0 END) as verifikasi_count')
                )
                ->where('cabangs.cabang_level', 2)
                ->where('cabangs.cabang_root', $cabangCd)
                ->groupBy('cabangs.cabang_cd', 'cabangs.cabang_nm')
                ->get();

            // Hitung total berdasarkan data cabang
            $this->totals = [
                'draft' => $this->cabangData->sum('draft_count'),
                'validasi' => $this->cabangData->sum('validasi_count'),
                'terverifikasi' => $this->cabangData->sum('verifikasi_count'),
                'total' => $this->cabangData->sum('total_count'),
            ];

            // Ambil daftar cabang dan ranting
            $this->cabangList = Cabang::where('cabang_level', 1)->get();
            $this->rantingList = Cabang::where('cabang_level', 2)
                ->where('cabang_root', $cabangCd)
                ->get();
        }
    }



    public function render()
    {



        return view('livewire.admin.dashboard', [
            'cabangData' => $this->cabangData,
            'totals' => $this->totals,
            'cabangList' => $this->cabangList,
            'rantingList' => $this->rantingList,
            'cabangs' => $this->cabangs,
        ]);
    }
}
